<?php


use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/**
 * AUTHENTICATION Routes for all
 * Admin, Mentors, Users
 */
Route::middleware('guest')->group(function () {
    Route::prefix('user')->group(function () {
        Route::name('user.')->group(function () {
            Route::middleware('guest:web')->group(function () {
                Route::view('login', 'user.auth.login')->name('login');
                Route::view('register', 'user.auth.register')->name('register');

                Route::post('login', [AuthController::class, 'login'])->name('login.req'); //uses users Auth Controller
                Route::post('register', [AuthController::class, 'register'])->name('register.req'); //uses users Auth Controller
            });
        });

        // ------------------------------------------------------
        Route::middleware('auth')->group(function () {
            // Verify email page
            Route::get('/email/verify', function () {
                return view('user.auth.verify-email');
            })->name('verification.notice');

            // Resent verification email
            Route::post('/email/verification-notification', function (Request $request) {
                $request->user()->sendEmailVerificationNotification();
                return back()->with('status', 'Verification link sent!');
            })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

            Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
                $request->fulfill();
                return redirect('/home');
            })->middleware(['auth', 'signed'])->name('verification.verify');
        });

        // ------------------------------------------------------
        // Forgot password page
        Route::get('/forgot-password', function () {
            return view('user.auth.forgot-password');
        })->middleware('guest')->name('password.request');

        Route::post('/forgot-password', function (Request $request) {
            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink($request->only('email'));

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        })->middleware('guest')->name('password.email');

        Route::get('/reset-password/{token}', function (string $token) {
            return view('user.auth.reset-password', ['token' => $token]);
        })->middleware('guest')->name('password.reset');

        Route::post('/reset-password', function (Request $request) {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('user.login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
        })->middleware('guest')->name('password.update');
    });
});

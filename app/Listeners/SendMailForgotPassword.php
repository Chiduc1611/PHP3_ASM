<?php

namespace App\Listeners;

use App\Events\SendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\JsonResponse;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class SendMailForgotPassword implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(SendMail $sendMail)
    {
        dd($sendMail);
    }

    /**
     * Handle the event.
     */
    public function handle()
    {
        $response = Password::broker()->sendResetLink(
            request()->only('email')
        );

        if ($response == Password::RESET_LINK_SENT) {
            return request()->wantsJson()
                ? new JsonResponse(['message' => trans($response)], 200)
                : back()->with('status', trans($response));
        } else {
            if (request()->wantsJson()) {
                throw ValidationException::withMessages([
                    'email' => [trans($response)],
                ]);
            } else {
                return back()
                    ->withInput(request()->only('email'))
                    ->withErrors(['email' => trans($response)]);
            }
        }
    }
}

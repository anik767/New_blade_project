<?php

namespace App\Traits;

use Illuminate\Http\RedirectResponse;

trait AdminNotificationTrait
{
    /**
     * Redirect with success message
     */
    public function successRedirect(string $message, string $route = null): RedirectResponse
    {
        if ($route) {
            return redirect()->route($route)->with('success', $message);
        }
        return redirect()->back()->with('success', $message);
    }

    /**
     * Redirect with error message
     */
    public function errorRedirect(string $message, string $route = null): RedirectResponse
    {
        if ($route) {
            return redirect()->route($route)->with('error', $message);
        }
        return redirect()->back()->with('error', $message);
    }

    /**
     * Redirect with warning message
     */
    public function warningRedirect(string $message, string $route = null): RedirectResponse
    {
        if ($route) {
            return redirect()->route($route)->with('warning', $message);
        }
        return redirect()->back()->with('warning', $message);
    }

    /**
     * Redirect with info message
     */
    public function infoRedirect(string $message, string $route = null): RedirectResponse
    {
        if ($route) {
            return redirect()->route($route)->with('info', $message);
        }
        return redirect()->back()->with('info', $message);
    }

    /**
     * Handle exceptions with proper error messages
     */
    public function handleException(\Exception $e, string $defaultMessage = 'An error occurred'): RedirectResponse
    {
        $message = config('app.debug') ? $e->getMessage() : $defaultMessage;
        return $this->errorRedirect($message);
    }

    /**
     * Validate and handle validation errors
     */
    public function validateWithNotification(array $data, array $rules, array $messages = []): bool
    {
        $validator = validator($data, $rules, $messages);
        
        if ($validator->fails()) {
            return false;
        }
        
        return true;
    }
} 
<?php

class Flash
{
    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type

        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            switch ($_SESSION['flash']['type']) {
                case 'error':
                    echo '<div class="absolute top-5 end-10">
                    <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="flex-shrink-0 h-4 w-4 text-red-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M6 18L18 6M6 6l12 12"></path>
                            </div>
                            <div class="ms-2">
                                <div class="text-sm font-medium">'
                                    . $_SESSION['flash']['message'] . ' <strong>gagal</strong>
                                </div>
                            </div>
                            <div class="ps-3 ms-auto">
                                <div class="-mx-1.5 -my-1.5">
                                    <button id="dismiss-button" type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="#dismiss-alert">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                    break;
                case 'success':
                    echo '<div class="absolute top-5 end-10">
                    <div id="dismiss-alert" class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-green-50 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="flex-shrink-0 h-4 w-4 text-green-600 mt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="m9 12 2 2 4-4"/></svg>
                            </div>
                            <div class="ms-2">
                                <div class="text-sm font-medium">'
                                . $_SESSION['flash']['message'] . ' <strong>berhasil</strong>
                                </div>
                            </div>
                            <div class="ps-3 ms-auto">
                                <div class="-mx-1.5 -my-1.5">
                                    <button id="dismiss-button" type="button" class="inline-flex bg-green-50 rounded-lg p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600 dark:bg-transparent dark:hover:bg-green-800/50 dark:text-green-600" data-hs-remove-element="#dismiss-alert">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="flex-shrink-0 h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                break;
            }
        }
        unset($_SESSION['flash']);
        
    }
}

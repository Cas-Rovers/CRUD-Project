<?php

    namespace App\Http\Controllers;

    use Illuminate\Contracts\View\Factory;
    use Illuminate\Foundation\Application;
    use Illuminate\Contracts\View\View;

    class HomeController extends Controller
    {
        /**
         * Display the welcome view.
         *
         * @return Factory|Application|View
         */
        public function index(): Factory|Application|View
        {
            return view('frontend.welcome');
        }
    }

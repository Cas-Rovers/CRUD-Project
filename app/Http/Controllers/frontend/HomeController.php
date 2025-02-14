<?php

    namespace App\Http\Controllers\frontend;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

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

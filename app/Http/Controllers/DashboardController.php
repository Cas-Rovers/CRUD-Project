<?php

    namespace App\Http\Controllers;

    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

//    use Illuminate\Http\Request;

    class DashboardController extends Controller
    {
        /**
         * Display the dashboard view.
         *
         * @return Factory|Application|View The dashboard view instance.
         */
        public function index(): Factory|Application|View
        {
            return view('admin.auth.dashboard');
        }
    }

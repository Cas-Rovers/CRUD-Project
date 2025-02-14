<?php

    namespace App\Http\Controllers\admin;

    use App\Http\Controllers\Controller;
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

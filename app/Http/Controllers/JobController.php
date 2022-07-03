<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class JobController extends Controller
{

    public function index()
    {
        return view('pages.home');

    }
    public function add(Request $request)
    {

        $crawler = new Crawler(file_get_contents($request->input('url')));


        $crawlers = $crawler->filter('.tr_job_card_main_action')->each(function (Crawler $node, $i) {

            $crawler_item = new Crawler(file_get_contents($node->link()->getUri()));

            $job = new Job();

            $job->title = $crawler_item->filter('.js-translate-title')->text();
            $job->company = $crawler_item->filter('#company-widget-box .h6 ')->text();
            $job->location = $crawler_item->filter('ol.breadcrumb li')->eq(2)->text();
            $job->description = $crawler_item->filter('.job-description')->html();
            $job->logo = $crawler_item->filter('.company-logo')->image()->getUri();
            $job->save();


            if (!$job->save()) {
                return 'Запись' . $crawler_item->filter('.js-translate-title')->text() . ' не создана!';
            } else {
                return 'Добавлено!';
            }

        });

        return redirect()->route('job.list');
    }

    public function list()
    {
        $jobs = Job::paginate(15);

        $list_location = Job::query()->get()->unique('location');

        return view('pages.all_jobs', ['jobs' =>$jobs, 'list_location' => $list_location]);
    }

    public function show(Job $job)
    {
        return view('pages.show_job', ['job' => $job] );
    }

    public function location(Job $job, Request $request)
    {

        $jobs = Job::query()->where('location', $request->input('location') )->paginate(15);

        $list_location = Job::query()->get()->unique('location');

        return  view('pages.all_jobs', ['jobs' =>$jobs, 'list_location' => $list_location]);
    }


}


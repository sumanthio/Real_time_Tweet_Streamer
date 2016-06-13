<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ConnectToStreamer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect_to_streamer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Connect to the Twitter Streaming API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($twitterStream)
    {

        $this->twitterStream = $twitterStream;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY', '7dJePIPht6iONKWt5dV0qfax8');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET', 'WSKeIKGlcqmmpia7V0Kr1i0p5hM7jbIOvI1ZTMV0PoekGfwmb1');

        $this->twitterStream->consumerKey = $twitter_consumer_key;
        $this->twitterStream->consumerSecret = $twitter_consumer_secret;
        $this->twitterStream->setTrack(array('angular'));
        $this->twitterStream->consume();
    }
}

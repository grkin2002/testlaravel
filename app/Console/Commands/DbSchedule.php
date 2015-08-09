<?php

namespace App\Console\Commands;

use Cache;
use DB;
use Illuminate\Console\Command;

class DbSchedule extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'db:schedule';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Database Scheduled Task';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$voted_post = Cache::pull('voted_post');
		if (!isset($voted_post) || count($voted_post) == 0) {
			return;
		}
		foreach ($voted_post as $post_id) {
			//query DB according to each $post_id
			$records = DB::table('votes')
				->select(DB::raw('count(*) as vote_count, vote_result'))
				->where('post_id', '=', $post_id)
				->groupBy('vote_result')
				->orderBy('vote_result', 'asc')
				->get();

			$update_array = array(
				'agree_amount' => 0,
				'oppose_amount' => 0,
				'neutral_amount' => 0,
			);
			foreach ($records as $item) {

				if ($item->vote_result == 1) {
					$update_array['agree_amount'] = $item->vote_count;
				} elseif ($item->vote_result == 2) {
					$update_array['oppose_amount'] = $item->vote_count;
				} else {
					$update_array['neutral_amount'] = $item->vote_count;
				}
			}

			DB::table('posts')
				->where('id', $post_id)
				->update($update_array);
		}
	}
}

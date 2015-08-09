<?php

namespace App\Http\Middleware;

use Cache;
use Closure;

class CacheVariable {
	/**
	 * Retrieve the Board Ids and save in the Cache for ever, used by all the View later.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		Cache::rememberForever('board_id_for_news', function () {
			return \App\Board::where('type', 'news')->firstOrFail()->id;
		});

		Cache::rememberForever('board_id_for_post', function () {
			return \App\Board::where('type', 'post')->firstOrFail()->id;
		});

		return $next($request);
	}
}

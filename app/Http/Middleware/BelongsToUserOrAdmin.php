<?php

namespace App\Http\Middleware;

use App\Core\Components\Flash\Flash;
use App\Core\Components\Messenger\Models\Message;
use Closure;

class BelongsToUserOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $messageId = $request->messageId;

        $message = Message::where('id', $messageId);
        if (\Auth::user()->isAdmin()) {
            return $next($request);
        }

        if($message->count()) {
            $messageCount = $message->where('user_id', \Auth::user()->id);
            if($messageCount){
                return $next($request);
            }
        }
        if($request->ajax()) {
            return response()->json("Sorry. You Are not allowed to edit this message", 403);
        }
        return redirect()->back()->with(Flash::error("The message not found or doesn't belongs to you"));
    }
}

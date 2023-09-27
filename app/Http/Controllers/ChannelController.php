<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Test;
class ChannelController extends Controller
{

    /**
     * Channel Broadcast.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function broadcast()
    {
      return broadcast(new Test());
      // return "welcome to channel";
    }
}

<?php

namespace App\Http\Controllers\Admin;



use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

class VoteController extends Controller
{
    //handle
    private function handle($post_id, $user_id, $new_result)
    {

      $current_vote = \App\Vote::where('post_id','=', $post_id)->where('user_id', '=',$user_id)->first();

        if(!isset($current_vote))
        {
            $input['post_id']=$post_id;
            $input['user_id']=$user_id;
            $input['vote_result'] = $new_result;
            // create record in votes table
            $current_vote = \App\Vote::create($input);
            return " new vote";

        }
        else
        {
            //vote record existed, go to handle this situation
            if( $current_vote->vote_result == $new_result)
            {
                $return = "not changed";
                return $return;
            }
            else
            {
                $current_vote->vote_result = $new_result;
                $current_vote->save();
                 switch($new_result){
                    case 1: return " that is true!";
                            break;
                    case 2: return " no, I don't think so!";
                            break;
                    case 3: return " I am not sure!";
                            break;
                    default:return " error";
                }
            }
        }
    }//end handle

    //receive ajax call agree
    public function agree($pid, $uid){
      $result =$this->handle($pid, $uid, "1");
       return response( $result );
    }

    //receive ajax call oppose
    public function oppose($pid, $uid){
      $result =$this->handle($pid, $uid, "2");
       return response( $result );
    }

    //receive ajax call neutral
    public function neutral($pid, $uid){
      $result =$this->handle($pid, $uid, "3");
       return response( $result );
    }


}

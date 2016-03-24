<?php

namespace App\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function create()
    {
        $input = $_POST;
    
       
        $input['user_id'] = static::$auth->user()->id;

        $newcomment = new Comment($input);

        if( ! $newcomment->isValid()){
            $_SESSION['comment.form'] = $newcomment;
            header("Location:.\?page=comingsoonsingle&id=" . $newcomment->song_id);
            exit();
        }
        $newcomment->save();
        header("Location: ./?page=comingsoonsingle&id=" . $newcomment->song_id . "#comment-" . $newcomment->id);
    }
}
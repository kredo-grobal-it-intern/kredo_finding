<?php

use App\User;
use App\Constants\UserType;

function isWorker($user_id){
    $user = User::find($user_id);
    return ($user->user_type == UserType::Worker) ? true : false;
}

function profileImageInProfile($image){
    if($image){
        echo '<img src="'.$image.'">';
    }else{
        echo '<i class="fa-solid '.((isWorker(Auth::id())) ? 'fa-circle-user' : 'fa-building').' profile-icon d-block text-center mt-4"></i>';
    }
}

function profileImageInLike($image){
    if($image){
        echo '<img src="'.$image.'">';
    }else{
        echo '<i class="fa-solid '.((isWorker(Auth::id())) ? 'fa-building pl-2' : 'fa-circle-user').'"></i>';
    }
}

function profileImageInMessage($image){
    if($image){
        echo '<img src="'.$image.'">';
    }else{
        echo '<i class="fa-solid '.((isWorker(Auth::id())) ? 'fa-building' : 'fa-user').' index-icon"></i>';
    }
}

function workerProfileImage($image){
    echo ($image) ? '<img src="'.$image.'" class="profile-image">' : '<i class="fa-solid fa-user profile-icon d-block text-center"></i>';
}

function companyProfileImage($image){
    echo ($image) ? '<img src="'.$image.'" class="profile-image">' : '<i class="fa-solid fa-building mr-3"></i>';
}

function profileImageInNav($image){
    if($image){
        echo '<img src="'.$image.'" class="profile-image-navbar">';
    }else{
        echo '<i class="fa-solid '.((isWorker(Auth::id())) ? 'fa-circle-user' : 'fa-building').'"></i>';
    }
}

function profileImageInMypage(){
    echo '<i class="'.((isWorker(Auth::id())) ? 'fas fa-user' : 'fas fa-building').'"></i>';
}

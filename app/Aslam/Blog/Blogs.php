<?php

namespace App\Aslam\Blog;

use App\Models\Blog;

class Blogs
{
    public function createOrEdit($id = null, $data)
    {
        if ($id) {
            $blog = Blog::where('id', $id)->update([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'description' => $data['description'],
                'status' => $data['status'],
                'image' => $data['image'],
            ]);
            $blog->save();
            return $blog;
        } else {
            $blog = Blog::creat([
                'title' => $data['title'],
                'subtitle' => $data['subtitle'],
                'description' => $data['description'],
                'status' => $data['status'],
                'image' => $data['image'],
            ]);
            $blog->save();
            return $blog;
        }

    }
    public function deleteBlog($id)
    {
        $blog = Blog::where('id',$id)->delete();
        return ;
    }
}

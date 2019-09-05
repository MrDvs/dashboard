<?php 

class bookmark {

    public function addBookmark($name, $url, $logo_path)
    {
		$createBookmakr = DB::query('INSERT INTO bookmarks (name, url, logo_path) VALUES (:name, :url , :logo_path)', array(':name' => $name, ':url' => $url, ':logo_path' => $logo_path));
    }
    
}
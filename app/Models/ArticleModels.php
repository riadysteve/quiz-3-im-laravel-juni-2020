<?php 

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArticleModels {
  public static function get_all() {
    $items = DB::table('articles')->get();
    return $items;
  }

  public static function save($data) {
    $new_items = DB::table('articles')->insert($data);
    return $new_items;
  }

  public static function update($id, $data) {
    $update_item = DB::table('articles')->where('id', $id)->update($data);
    return $update_item;
  }

  public static function find_by_id($id) {
    $items = DB::table('articles')->where('id', $id)->first();
    return $items;
  }

  public static function delete($id) {
    $item = DB::table('articles')->where('id', $id)->delete();
  }

}


?>
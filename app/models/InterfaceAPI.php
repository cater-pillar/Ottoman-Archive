<?php

namespace App\Models;

use App\Core\App;

interface InterfaceAPI {
    static public function index();
    static public function create($parameters);
    static public function show($id);
    static public function destroy($id);
    static public function update($arr, $id);
}
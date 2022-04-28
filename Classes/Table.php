<?php

interface Table
{
    public function all();
    public function find($id);
    public function destroy($id);
}
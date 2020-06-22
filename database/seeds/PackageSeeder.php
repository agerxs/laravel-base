<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'name'=>'12-starter',
            'duration'=>12,
            'total_amount'=>11880,
            'month_amount'=>990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'24-starter',
            'duration'=>24,
            'total_amount'=>23.760,
            'month_amount'=>990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'36-starter',
            'duration'=>36,
            'total_amount'=>35.640,
            'month_amount'=>990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'12-basic',
            'duration'=>12,
            'total_amount'=>23880,
            'month_amount'=>1990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'24-basic',
            'duration'=>24,
            'total_amount'=>47760,
            'month_amount'=>1990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'36-basic',
            'duration'=>36,
            'total_amount'=>71640,
            'month_amount'=>1990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'12-gold',
            'duration'=>12,
            'total_amount'=>47880,
            'month_amount'=>3990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'24-gold',
            'duration'=>24,
            'total_amount'=>95760,
            'month_amount'=>3990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'36-gold',
            'duration'=>36,
            'total_amount'=>143640,
            'month_amount'=>3990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'12-premium',
            'duration'=>12,
            'total_amount'=>95880,
            'month_amount'=>7990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'24-premium',
            'duration'=>24,
            'total_amount'=>191760,
            'month_amount'=>7990,
        ]);DB::table('packages')->insert(
        [
            'name'=>'36-premium',
            'duration'=>36,
            'total_amount'=>287640,
            'month_amount'=>7990,
        ]);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menus = array(
            array('id' => '1', 'title' => 'GES', 'url' => NULL, 'parent_id' => '0', 'position' => NULL, 'created_at' => '2022-07-29 13:34:22', 'updated_at' => '2022-07-29 13:34:22'),
            array('id' => '2', 'title' => 'Spiro', 'url' => NULL, 'parent_id' => '0', 'position' => NULL, 'created_at' => '2022-07-29 13:34:26', 'updated_at' => '2022-07-29 13:34:26'),
            array('id' => '3', 'title' => 'Who we are', 'url' => NULL, 'parent_id' => '1', 'position' => NULL, 'created_at' => '2022-07-29 13:34:57', 'updated_at' => '2022-07-29 13:34:57'),
            array('id' => '4', 'title' => 'What we do', 'url' => NULL, 'parent_id' => '1', 'position' => NULL, 'created_at' => '2022-07-29 13:35:03', 'updated_at' => '2022-07-29 13:35:03'),
            array('id' => '5', 'title' => 'About us', 'url' => NULL, 'parent_id' => '3', 'position' => NULL, 'created_at' => '2022-07-29 13:35:35', 'updated_at' => '2022-07-29 13:35:35'),
            array('id' => '6', 'title' => 'Our vision', 'url' => NULL, 'parent_id' => '3', 'position' => NULL, 'created_at' => '2022-07-29 13:35:44', 'updated_at' => '2022-07-29 13:35:44'),
            array('id' => '7', 'title' => 'Locations', 'url' => NULL, 'parent_id' => '1', 'position' => NULL, 'created_at' => '2022-07-29 13:35:53', 'updated_at' => '2022-07-29 13:35:53'),
            array('id' => '8', 'title' => 'Grow together', 'url' => NULL, 'parent_id' => '1', 'position' => NULL, 'created_at' => '2022-07-29 13:36:04', 'updated_at' => '2022-07-29 13:36:04'),
            array('id' => '9', 'title' => 'General Services', 'url' => NULL, 'parent_id' => '4', 'position' => NULL, 'created_at' => '2022-07-29 13:36:27', 'updated_at' => '2022-07-29 13:36:27'),
            array('id' => '10', 'title' => 'Show Ready', 'url' => NULL, 'parent_id' => '4', 'position' => NULL, 'created_at' => '2022-07-29 13:36:39', 'updated_at' => '2022-07-29 13:36:39'),
            array('id' => '11', 'title' => 'Sustainability', 'url' => NULL, 'parent_id' => '4', 'position' => NULL, 'created_at' => '2022-07-29 13:36:58', 'updated_at' => '2022-07-29 13:36:58'),
            array('id' => '12', 'title' => 'Event Intelligence', 'url' => NULL, 'parent_id' => '4', 'position' => NULL, 'created_at' => '2022-07-29 13:37:11', 'updated_at' => '2022-07-29 13:37:11'),
            array('id' => '13', 'title' => 'Who we are', 'url' => NULL, 'parent_id' => '2', 'position' => NULL, 'created_at' => '2022-07-29 13:37:40', 'updated_at' => '2022-07-29 13:37:40'),
            array('id' => '14', 'title' => 'What we do', 'url' => NULL, 'parent_id' => '2', 'position' => NULL, 'created_at' => '2022-07-29 13:37:47', 'updated_at' => '2022-07-29 13:37:47'),
            array('id' => '15', 'title' => 'Who we do it for', 'url' => NULL, 'parent_id' => '2', 'position' => NULL, 'created_at' => '2022-07-29 13:38:00', 'updated_at' => '2022-07-29 13:38:00'),
            array('id' => '16', 'title' => 'How we get there', 'url' => NULL, 'parent_id' => '2', 'position' => NULL, 'created_at' => '2022-07-29 13:38:18', 'updated_at' => '2022-07-29 13:38:18'),
            array('id' => '17', 'title' => 'Values', 'url' => NULL, 'parent_id' => '13', 'position' => NULL, 'created_at' => '2022-07-29 13:39:08', 'updated_at' => '2022-07-29 13:39:08'),
            array('id' => '18', 'title' => 'Spiro at a glance', 'url' => NULL, 'parent_id' => '13', 'position' => NULL, 'created_at' => '2022-07-29 13:39:24', 'updated_at' => '2022-07-29 13:39:24'),
            array('id' => '19', 'title' => 'Pursuit of there-ness', 'url' => NULL, 'parent_id' => '13', 'position' => NULL, 'created_at' => '2022-07-29 13:39:39', 'updated_at' => '2022-07-29 13:39:39'),
            array('id' => '20', 'title' => 'New Now', 'url' => NULL, 'parent_id' => '13', 'position' => NULL, 'created_at' => '2022-07-29 13:39:49', 'updated_at' => '2022-07-29 13:39:49'),
            array('id' => '21', 'title' => 'Brand Activations', 'url' => NULL, 'parent_id' => '14', 'position' => NULL, 'created_at' => '2022-07-29 13:40:10', 'updated_at' => '2022-07-29 13:40:10'),
            array('id' => '22', 'title' => 'Corporate Events', 'url' => NULL, 'parent_id' => '14', 'position' => NULL, 'created_at' => '2022-07-29 13:40:25', 'updated_at' => '2022-07-29 13:40:25'),
            array('id' => '23', 'title' => 'Digital Hybrid Experiences', 'url' => NULL, 'parent_id' => '14', 'position' => NULL, 'created_at' => '2022-07-29 13:40:42', 'updated_at' => '2022-07-29 13:40:42'),
            array('id' => '24', 'title' => 'Exhibitions', 'url' => NULL, 'parent_id' => '14', 'position' => NULL, 'created_at' => '2022-07-29 13:40:54', 'updated_at' => '2022-07-29 13:40:54'),
            array('id' => '25', 'title' => 'Sports Marketing', 'url' => NULL, 'parent_id' => '14', 'position' => NULL, 'created_at' => '2022-07-29 13:41:06', 'updated_at' => '2022-07-29 13:41:06'),
            array('id' => '26', 'title' => 'Taqa', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:41:28', 'updated_at' => '2022-07-29 13:41:28'),
            array('id' => '27', 'title' => 'MoE', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:41:37', 'updated_at' => '2022-07-29 13:41:37'),
            array('id' => '28', 'title' => 'AEC / SAMI', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:41:52', 'updated_at' => '2022-07-29 13:41:52'),
            array('id' => '29', 'title' => 'Sobha', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:42:05', 'updated_at' => '2022-07-29 13:42:05'),
            array('id' => '30', 'title' => 'GE Healthcare', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:42:16', 'updated_at' => '2022-07-29 13:42:16'),
            array('id' => '31', 'title' => 'Cisco', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:42:26', 'updated_at' => '2022-07-29 13:42:26'),
            array('id' => '32', 'title' => 'Husky', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:42:37', 'updated_at' => '2022-07-29 13:42:37'),
            array('id' => '33', 'title' => 'AD Tourism', 'url' => NULL, 'parent_id' => '15', 'position' => NULL, 'created_at' => '2022-07-29 13:42:47', 'updated_at' => '2022-07-29 13:42:47'),
            array('id' => '34', 'title' => 'Beliefs', 'url' => NULL, 'parent_id' => '16', 'position' => NULL, 'created_at' => '2022-07-29 13:43:18', 'updated_at' => '2022-07-29 13:43:18'),
            array('id' => '35', 'title' => 'ARL', 'url' => NULL, 'parent_id' => '16', 'position' => NULL, 'created_at' => '2022-07-29 13:43:27', 'updated_at' => '2022-07-29 13:43:27'),
            array('id' => '36', 'title' => 'Communities', 'url' => NULL, 'parent_id' => '16', 'position' => NULL, 'created_at' => '2022-07-29 13:43:39', 'updated_at' => '2022-07-29 13:43:39'),
            array('id' => '37', 'title' => 'Connections', 'url' => NULL, 'parent_id' => '16', 'position' => NULL, 'created_at' => '2022-07-29 13:44:02', 'updated_at' => '2022-07-29 13:44:02')
        );
        Menu::insert($menus);
    }
}

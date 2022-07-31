<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use ZipArchive;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        if (PHP_OS === 'WINNT')
        {
            exec(sprintf("rd /s /q %s", escapeshellarg(public_path('/assets/frontend/images'))));
        }
        else
        {
            exec(sprintf("rm -rf %s", escapeshellarg(public_path('/assets/frontend/images'))));
        }
    
        $zip = new ZipArchive;
        if ($zip->open( resource_path('seeder/images.zip')) === TRUE) {
            // return 'echooo';
            $zip->extractTo( public_path('/assets/frontend'));
            $zip->close();
        

            DB::table('roles')->insert([
                [
                    'id' => 1,
                    'name' => 'admin',
                    'permission' => 'CRUD',
                ],
                [
                    'id' => 2,
                    'name' => 'moderator',
                    'permission' => 'CRU',
                ],
                [
                    'id' => 3,
                    'name' => 'patient',
                    'permission' => 'N\A',
                ],
                [
                    'id' => 4,
                    'name' => 'writer',
                    'permission' => 'N\A',
                ]
            ]);
    
            
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'f_name' => 'Super',
                    'l_name' => 'Admin',
                    'email' => 'admin@nomail.com',
                    'password' => Hash::make(12341234),
                    'cell_number' => '0174589759',
                    'sex' => 'পুরুষ',
                    // 'age' => '২৫',
                    // 'height' => '৫.৭',
                    // 'weight' => '১১২',
                    // 'ocupation' => 'ওয়েভ ডেভেলপার',
                    'role_id' => 1,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user0.jpg',
                    
                
                    
                ],
                [
                    'id' => 2,
                    'f_name' => 'আল-নাহিয়ান',
                    'l_name' => 'তন্ময়',
                    'email' => 'tonmoy@gmail.com',
                    'password' => 'zsdfwq',
                    'cell_number' => '01745875879',
                    'sex' => 'পুরুষ',
                    // 'age' => '২০',
                    // 'height' => '৫.৭',
                    // 'weight' => '৬৫',
                    // 'ocupation' => 'শিক্ষক',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user2.jpg'
                ],
                [
                    'id' => 3,
                    'f_name' => 'সুলতানা',
                    'l_name' => 'রাজিয়া',
                    'email' => 'sultana@gmail.com',
                    'password' => '12vdse34',
                    'cell_number' => '0179639759',
                    'sex' => 'নারী',
                    // 'age' => '৪৫',
                    // 'height' => '৫.৬',
                    // 'weight' => '৬৬',
                    // 'ocupation' => 'গৃহিণী',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user3.jpg'
                ],
                [
                    'id' => 4,
                    'f_name' => 'আনোয়ার',
                    'l_name' => 'হোসেন',
                    'email' => 'anwar@gmail.com',
                    'password' => '1234',
                    'cell_number' => '017497559',
                    'sex' => 'পুরুষ',
                    // 'age' => '২৫',
                    // 'height' => '৫.৭',
                    // 'weight' => '১১২',
                    // 'ocupation' => 'ইঞ্জিনিয়ার',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user4.jpg'
                ],
                [
                    'id' => 5,
                    'f_name' => 'তাজবী',
                    'l_name' => 'আহমেদ',
                    'email' => 'tazbi@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'পুরুষ',
                    // 'age' => '২৫',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'ব্যবসায়ী',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user5.png'
                ],
                [
                    'id' => 6,
                    'f_name' => 'শাওন',
                    'l_name' => 'চৌধুরী',
                    'email' => 'shawon@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'পুরুষ',
                    // 'age' => '৩৫',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'অভিনেত্রী',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
                [
                    'id' => 7,
                    'f_name' => 'তাফসিয়া',
                    'l_name' => 'খানম',
                    'email' => 'tafsia@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'নারী',
                    // 'age' => '২৫',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'ছাত্রী',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user7.jpg'
                ],
                [
                    'id' => 8,
                    'f_name' => 'মাসুক',
                    'l_name' => 'আহমেদ',
                    'email' => 'masuk@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'পুরুষ',
                    // 'age' => '২৬',
                    // 'height' => '৫.৫',
                    // 'weight' => '৬০',
                    // 'ocupation' => 'পলিটিশিয়ান',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
                [
                    'id' => 9,
                    'f_name' => 'জান্নাতুল',
                    'l_name' => 'নাইম',
                    'email' => 'jannatul@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'নারী',
                    // 'age' => '১৬',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'ব্যবসায়ী',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
                [
                    'id' => 10,
                    'f_name' => 'কমলা',
                    'l_name' => 'বানু',
                    'email' => 'komola@gmail.com',
                    'password' => '12de34',
                    'cell_number' => '0174559',
                    'sex' => 'নারী',
                    // 'age' => '৬৯',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'সেবিকা',
                    'role_id' => 3,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
    
                [
                    'id' => 11,
                    'f_name' => 'জহির',
                    'l_name' => 'রায়হান',
                    'email' => 'johir@gmail.com',
                    'password' => '1fge34',
                    'cell_number' => '01745559',
                    'sex' => 'পুরুষ',
                    // 'age' => '৬৯',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'লেখক',
                    'role_id' => 4,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
    
                [
                    'id' => 12,
                    'f_name' => 'জগদীশ',
                    'l_name' => 'বসু',
                    'email' => 'jssogodish@gmail.com',
                    'password' => '12dhdy',
                    'cell_number' => '01745359',
                    'sex' => 'পুরুষ',
                    // 'age' => '৬৯',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'লেখক',
                    'role_id' => 4,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user6.jpg'
                ],
                [
                    'id' => 13,
                    'f_name' => 'মিস্টার',
                    'l_name' => 'বট',
                    'email' => 'jogodish@gmail.com',
                    'password' => '12dhdy',
                    'cell_number' => '01745359',
                    'sex' => 'পুরুষ',
                    // 'age' => '৬৯',
                    // 'height' => '৫.৫',
                    // 'weight' => '৭৬',
                    // 'ocupation' => 'মডারেটর',
                    'role_id' => 2,
                    'account_status' => 'active',
                    'avatar' => 'images/user/user1.jpg'
                ],
            ]);
    
    
    
    
    
    
            DB::table('abouts')->insert(
                [
                    'id' => 1,
                    'profile_img' => 'https://i0.wp.com/365webresources.com/wp-content/uploads/2016/09/FREE-PROFILE-AVATARS.png?resize=502%2C494&ssl=1',
                    'name' => 'শাহারিয়ার আহামেদ',
                    'degree' => 'পুষ্টিবিদ',
    
                    'brife_description' => 'পুষ্টিবিদ আয়শা সিদ্দিকা বিগত ১৬ বছর ধরে খাদ্য ও পুষ্টি পেশায়   নিয়োজিত রয়েছেন। কর্ম জীবনের শুরু ২০০৫ থেকে ২০০৬ পর্যন্ত অ্যাপোলো হসপিটালে, পরবর্তীতে ২০০৬-২০১৬ পর্যন্ত স্কয়ার হসপিটালে ডায়েট ও নিউট্রিশন কনসালটেন্ট হিসেবে কর্মরত ছিলেন। বর্তমানে তিনি ডায়েট ও নিউট্রিশন কনসালটেন্ট হিসেবে জাপান বাংলাদেশ ফেন্ড্রশিপ হসপিটালে এবং ব্যাবস্থাপনা পরিচালক হিসেবে ইজি ডায়েট বিডি লিমিটেড প্রতিষ্টানে কর্মরত আছেন।',
    
                    'service_img' => 'https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260',
                    'service_title' => 'Where I give my services',
    
                    'service_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    
                ]
            );
    
    
    
    
    
    
            DB::table('transactions')->insert(
                [
                    [
                        'id' => 1,
                        'trix_id' => '5M414PCA01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'pending',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 2,
                        'trix_id' => '5M414PCA02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 3,
                        'trix_id' => '5M414PCA03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 4,
                        'trix_id' => '5M414PCA04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 5,
                        'trix_id' => '5M414PCA05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 6,
                        'trix_id' => '5M414PCA06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 7,
                        'trix_id' => '5M414PCA07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'pending',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 8,
                        'trix_id' => '5M414PCA08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 9,
                        'trix_id' => '5M414PCA09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 1
                    ],
                    [
                        'id' => 10,
                        'trix_id' => '5M414PCA10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5558-143',
                        'user_id' => 1,
                        'payment_status' => 'pending',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
    
    
    
    
                    [
                        'id' => 11,
                        'trix_id' => '5M414PCB01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 12,
                        'trix_id' => '5M414PCB02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 13,
                        'trix_id' => '5M414PCB03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 14,
                        'trix_id' => '5M414PCB04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'pending',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
    
                    // 
    
    
                    [
                        'id' => 15,
                        'trix_id' => '5M414PCB05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 16,
                        'trix_id' => '5M414PCB06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 17,
                        'trix_id' => '5M414PCB07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 18,
                        'trix_id' => '5M414PCB08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'pending',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 19,
                        'trix_id' => '5M414PCB09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 20,
                        'trix_id' => '5M414PCB10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0135-5577-388',
                        'user_id' => 2,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 21,
                        'trix_id' => '5M414P1C01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 22,
                        'trix_id' => '5M414P1C02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 23,
                        'trix_id' => '5M414P1C03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 24,
                        'trix_id' => '5M414P1C04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'pending',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 25,
                        'trix_id' => '5M414P1C05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 26,
                        'trix_id' => '5M414P1C06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 27,
                        'trix_id' => '5M414P1C07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 28,
                        'trix_id' => '5M414P1C08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 29,
                        'trix_id' => '5M414P1C09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 30,
                        'trix_id' => '5M414P1C10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5551-625',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 31,
                        'trix_id' => '5M414PCD01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ],
                    [
                        'id' => 32,
                        'trix_id' => '5M414PCD02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ], [
                        'id' => 33,
                        'trix_id' => '5M414PCD03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ], [
                        'id' => 34,
                        'trix_id' => '5M414PCD04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ], [
                        'id' => 35,
                        'trix_id' => '5M414PCD05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
    
                        'handler_id' => 2
                    ], [
                        'id' => 36,
                        'trix_id' => '5M414PCD06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'pending',
                        'payment_method' => 'nagad',
    
                        'handler_id' => 2
                    ], [
                        'id' => 37,
                        'trix_id' => '5M414PCD07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ], [
                        'id' => 38,
                        'trix_id' => '5M414PCD08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
    
                        'handler_id' => 2
                    ], [
                        'id' => 39,
                        'trix_id' => '5M414PCD09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'pending',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 40,
                        'trix_id' => '5M414PCD10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5522-603',
                        'user_id' => 4,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 2
                    ], [
                        'id' => 41,
                        'trix_id' => '5M414PCE01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 2
                    ], [
                        'id' => 42,
                        'trix_id' => '5M414PCE02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 2
                    ], [
                        'id' => 43,
                        'trix_id' => '5M414PCE03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ], [
                        'id' => 44,
                        'trix_id' => '5M414PCE04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 2
                    ], [
                        'id' => 45,
                        'trix_id' => '5M414PCE05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ], [
                        'id' => 46,
                        'trix_id' => '5M414PCE06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ], [
                        'id' => 47,
                        'trix_id' => '5M414PCE07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 48,
                        'trix_id' => '5M414PCE08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 49,
                        'trix_id' => '5M414PCE09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 50,
                        'trix_id' => '5M414PCE10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0185-5580-060',
                        'user_id' => 5,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 51,
                        'trix_id' => '5M414PCF01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ], [
                        'id' => 52,
                        'trix_id' => '5M414PCF02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ], [
                        'id' => 53,
                        'trix_id' => '5M414PCF03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ], [
                        'id' => 54,
                        'trix_id' => '5M414PCF04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 2
                    ],
                    [
                        'id' => 55,
                        'trix_id' => '5M414PCF05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ],
                    [
                        'id' => 56,
                        'trix_id' => '5M414PCF06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 2
                    ],
                    [
                        'id' => 57,
                        'trix_id' => '5M414PCF07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 3,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 58,
                        'trix_id' => '5M414PCF08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 6,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 59,
                        'trix_id' => '5M414PCF09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 6,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 60,
                        'trix_id' => '5M414PCF10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+880-115-5559-639',
                        'user_id' => 6,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
    
    
    
    
    
                    [
                        'id' => 61,
                        'trix_id' => '5M414PCG01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 62,
                        'trix_id' => '5M414PCG02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 63,
                        'trix_id' => '5M414PCG03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 64,
                        'trix_id' => '5M414PCG04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 65,
                        'trix_id' => '5M414PCG05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 66,
                        'trix_id' => '5M414PCG06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 67,
                        'trix_id' => '5M414PCG07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 68,
                        'trix_id' => '5M414PCG08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 69,
                        'trix_id' => '5M414PCG09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
    
                    [
                        'id' => 70,
                        'trix_id' => '5M414PCG10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0155-5534-664',
                        'user_id' => 7,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 71,
                        'trix_id' => '5M414PCH01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 72,
                        'trix_id' => '5M414PCH02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 73,
                        'trix_id' => '5M414PCH03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 74,
                        'trix_id' => '5M414PCH04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 75,
                        'trix_id' => '5M414PCH05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 76,
                        'trix_id' => '5M414PCH06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 77,
                        'trix_id' => '5M414PCH07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 78,
                        'trix_id' => '5M414PCH08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 79,
                        'trix_id' => '5M414PCH09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 80,
                        'trix_id' => '5M414PCH10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0195-5597-980',
                        'user_id' => 8,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 81,
                        'trix_id' => '5M414PCI01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 82,
                        'trix_id' => '5M414PCI02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 83,
                        'trix_id' => '5M414PCI03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    // 
                    [
                        'id' => 84,
                        'trix_id' => '5M414PCI04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 85,
                        'trix_id' => '5M414PCI05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 86,
                        'trix_id' => '5M414PCI06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
                    [
                        'id' => 87,
                        'trix_id' => '5M414PCI07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 88,
                        'trix_id' => '5M414PCI08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 89,
                        'trix_id' => '5M414PCI09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ], [
                        'id' => 90,
                        'trix_id' => '5M414PCI10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0175-5532-046',
                        'user_id' => 9,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ], [
                        'id' => 91,
                        'trix_id' => '5M414PCJ01',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ], [
                        'id' => 92,
                        'trix_id' => '5M414PCJ02',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ], [
                        'id' => 93,
                        'trix_id' => '5M414PCJ03',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'nagad',
                        'handler_id' => 1
                    ], [
                        'id' => 94,
                        'trix_id' => '5M414PCJ04',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 95,
                        'trix_id' => '5M414PCJ05',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ],
    
    
                    [
                        'id' => 96,
                        'trix_id' => '5M414PCJ06',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 97,
                        'trix_id' => '5M414PCJ07',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 98,
                        'trix_id' => '5M414PCJ08',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ], [
                        'id' => 99,
                        'trix_id' => '5M414PCJ09',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'dbbl',
                        'handler_id' => 1
                    ], [
                        'id' => 100,
                        'trix_id' => '5M414PCJ10',
                        'amount' => '500',
                        'sent_to' => '+88-0171-0000-111',
                        'sent_from' => '+88-0165-5594-064',
                        'user_id' => 10,
                        'payment_status' => 'approved',
                        'payment_method' => 'bkash',
                        'handler_id' => 1
                    ]
    
    
    
    
    
                ]
            );
    
            DB::table('handlers')->insert(
                [
                    [
                        'id' => 1,
                        'user_id' => 1
                    ],
    
    
                    [
                        'id' => 2,
                        'user_id' => 13
                    ]
                ]
            );
            $img = array_diff(scandir(public_path('/assets/frontend/images/chambers/')), array('....', '...', '..', '.'));
    
    
            DB::table('chambers')->insert(
                [
                    [
                        'id' => 1,
                        'name' => 'ফাল্গুনী',
                        'house_no' => 'বাড়ি # ০১',
                        'road_number' => '১৮ নং রোড',
                        'area' => 'বকুল তলা',
                        'district' => 'জামালপুর',
                        'day' => 'রবি , মঙ্গল, বৃহস্পতি',
                        'time' => 'বিকাল ৫টা থেকে রাত ৯টা',
                        'c_m_position' => 1,
                        'img_url' => $img[2] ,
                        'patient_limit' => 25,
    
                    ],
                    [
                        'id' => 2,
                        'name' => 'কৃষ্ণচূড়া',
                        'house_no' => 'বাড়ি # ০২',
                        'road_number' => '২৩ নং রোড',
                        'area' => 'ধানমন্ডি',
                        'district' => 'ঢাকা',
                        'day' => 'শনি, সোম, বুধ',
                        'time' => 'সন্ধ্যা ৬ থেকে রাত ৯টা',
                        'c_m_position' => 2,
                        'img_url' => $img[3],
                        'patient_limit' => 25,
    
                    ],
                    [
                        'id' => 3,
                        'name' => 'বকুল',
                        'house_no' => 'বাড়ি # ০৩',
                        'road_number' => '১১ নং রোড',
                        'area' => 'পুলিশ লাইন',
                        'district' => 'ময়মনসিংহ',
                        'day' => 'শুক্রবার',
                        'time' => 'দুপুর ৩টা থেকে রাত ৯টা',
                        'c_m_position' => 30,
                        'img_url' => $img[4],
                        'patient_limit' => 25,
    
                    ]
    
                ]
            );
           
    
            DB::table('appointments')->insert(
                [
                    [
                        'id' => 1,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 1,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 1,
                        'chamber_id' => 2,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 2,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 2,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 2,
                        'chamber_id' => 2,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 3,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 3,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 3,
                        'chamber_id' => 1,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 4,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 4,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 4,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 5,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 5,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 5,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 6,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 6,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 6,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 7,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 7,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 7,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 8,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 8,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 8,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 9,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 9,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 9,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 10,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 10,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 10,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 11,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 11,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 11,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 12,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 12,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 12,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 13,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 13,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 13,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 14,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 14,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 14,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 15,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 15,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 16,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 16,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 16,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 17,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 17,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 17,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 18,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 18,
                        'appointed_date' => now()->format("Y-m-d"),
                        'transaction_id' => 18,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 19,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 1,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 19,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 20,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 2,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 20,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 21,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 3,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 21,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 22,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 4,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 22,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 23,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 5,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 23,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 24,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 6,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 24,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 25,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 7,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 25,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 26,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 8,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 26,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 27,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 9,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 27,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 28,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 10,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 28,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 29,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 11,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 29,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 30,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 12,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 30,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 31,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 13,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 31,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 32,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 14,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 32,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 33,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 33,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 34,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 16,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 34,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 35,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 17,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 35,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 36,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 36,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 37,
                        'desired_serial_date' => now()->addDays(2)->format("Y-m-d"),
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => now()->addDays(3)->format("Y-m-d"),
                        'transaction_id' => 37,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 38,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 38,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 39,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 39,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 40,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 40,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 41,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 41,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
    
    
                    [
                        'id' => 42,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 42,
                        'chamber_id' => 2,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 43,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 43,
                        'chamber_id' => 2,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 44,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 44,
                        'chamber_id' => 2,
                        'handler_id' => 2,
                    ],
                    [
                        'id' => 45,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 45,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 46,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 46,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 47,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 47,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 48,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 48,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 49,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 49,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 50,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 50,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 51,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 51,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 52,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 52,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 53,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 53,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 54,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 54,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 55,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 55,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 56,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 56,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 57,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 57,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 58,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 58,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 59,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 59,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 60,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 60,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 61,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 61,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 62,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 62,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 63,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 63,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 64,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 64,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 65,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 65,
                        'chamber_id' => 2,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 66,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 66,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 67,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 67,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 68,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 68,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 69,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 69,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 70,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 70,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 71,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 71,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 72,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 72,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 73,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 73,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 74,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 74,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 75,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 75,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 76,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 76,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 77,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 77,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 78,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 78,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 79,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 79,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 80,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 80,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 81,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 81,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 82,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 82,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
    
                    [
                        'id' => 83,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 83,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 84,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 84,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 85,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 85,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 86,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 86,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 87,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 87,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 88,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 88,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 89,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 89,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 90,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 90,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 91,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 91,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 92,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 92,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 93,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 93,
                        'chamber_id' => 3,
                        'handler_id' => 1
                    ],
                    [
                        'id' => 94,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 94,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 95,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 95,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 96,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 96,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 97,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 97,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 98,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 98,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 99,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 99,
                        'chamber_id' => 3,
                        'handler_id' => 2
                    ],
                    [
                        'id' => 100,
                        'desired_serial_date' => '0/0/2021',
                        'last_visit_date' => '0/0/2021',
                        'cause' => 'visit',
                        'present' => 'y',
                        'given_serial_no' => 15,
                        'appointed_date' => '0/09/2021',
                        'transaction_id' => 100,
                        'chamber_id' => 1,
                        'handler_id' => 2
                    ]
                ]
            );
    
            DB::table('social_media')->insert(
                [
    
                    'id' => 1,
                    'f_link' => 'www.fb.com',
                    'y_link' => 'www.youtube.com',
                    'l_link' => 'www.linkedin.com'
    
    
                ]
            );
    
            DB::table('subscribes')->insert(
                [
                    ['email' => 'abc@yaho.com'],
                    ['email' => 'xyz@yaho.com'],
                    ['email' => 'qwe@yaho.com'],
                    ['email' => 'thm@yaho.com'],
                    ['email' => 'xab@yaho.com'],
                    ['email' => 'psg@yaho.com'],
                    ['email' => 'gsy@yaho.com'],
                    ['email' => 'psy@yaho.com'],
                    ['email' => 'nef@yaho.com'],
                    ['email' => 'nfs@yaho.com'],
                ]
            );
    
            DB::table('services_section_inboxes')->insert(
                [
                    [
                        'name' => 'ridoy',
                        'occupation' => 'developer',
                        'age' => '24',
                        'gender' => 'male',
                        'message' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, ',
                        'email' => 'sfs@yaho.com',
                        'status' => 'unread',
    
                    ],
                    [
                        'name' => 'sultana',
                        'occupation' => 'housewife',
                        'age' => '24',
                        'gender' => 'female',
                        'message' => 'Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
                        'email' => 'bsg@yaho.com',
                        'status' => 'unread',
    
                    ],
                    [
                        'name' => 'anwar',
                        'occupation' => 'singer',
                        'age' => '24',
                        'gender' => 'male',
                        'message' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.",
                        'email' => 'mfh@yaho.com',
                        'status' => 'unread',
    
                    ],
                    [
                        'name' => 'tonmoy',
                        'occupation' => 'student',
                        'age' => '24',
                        'gender' => 'male',
                        'message' => "Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
                        'email' => 'ofb@yaho.com',
                        'status' => 'read',
    
                    ],
                    [
                        'name' => 'alex',
                        'occupation' => 'engineer',
                        'age' => '24',
                        'gender' => 'male',
                        'message' => "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.",
                        'email' => 'kygh@yaho.com',
                        'status' => 'unread',
    
                    ],
                ]
            );
    
    
            DB::table('services')->insert(
                [
    
                    'degree' => 'MBBS, FCPS',
                    'image_url' => 'images/blog/oats.jpg',
                    'title' => 'Shahariar Ahmad',
                    'short_description' => "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
                ]
            );
    
            DB::table('logos')->insert(
                [
                    'width' => '200',
                    'height' => '200',
                    'img_url' => 'http://dcms.test/phpmyadmin/themes/pmahomme/img/logo_left.png',
                ]
            );
    
    
    
    
    
            DB::table('menus')->insert(
                [
                    [
    
                        'position' => 1,
                        'name' => 'Home',
                        'link' => '/'
                    ],
                    [
    
                        'position' => 2,
                        'name' => 'Blog',
                        'link' => '/blog'
                    ],
                    [
    
                        'position' => 3,
                        'name' => 'Gallery',
                        'link' => '/gallery'
                    ],
                    [
    
                        'position' => 4,
                        'name' => 'About ',
                        'link' => '/about'
                    ],
                    [
    
                        'position' => 5,
                        'name' => 'Contact',
                        'link' => '/contact'
                    ],
                ]
            );
    
            DB::table('contacts')->insert(
                [
    
                    'height' => '700',
                    'width' => '100%', // delete column
                    'api_key' => 'http://dcms.test/phpmyadmin/',
                    'title' => 'Where I give my services',
                    'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem beatae vitae nemo animi veniam eaque aliquid. Fuga omnis hic dolorum aliquam reiciendis! Ipsam delectus facilis iusto mollitia deleniti ut corporis!',
                    'image' => 'images/blog/asparagus.jpg',
                ]
            );
    
            DB::table('banners')->insert(
                [
                    [
                        'id' => 1,
                        'title' => 'Hi, I am Shahariar Ahmad.',
                        'subtitle' => 'It is a long estasdblished fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
                        'button_text' => 'na',
                        'placement' => 'home',
                        'link' => 'www/links/',
                        'bg_image' => 'images/blog/peas.jpg'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Hi, I am Shahariar Ahmad.',
                        'subtitle' => 'It is a long established factgd that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
                        'button_text' => 'Appointment',
                        'placement' => 'about_o',
                        'link' => 'www/links/',
                        'bg_image' => 'images/blog/pati.jpeg'
                    ],
                    [
                        'id' => 3,
                        'title' => 'Hi, I am Shahariar Ahmad.',
                        'subtitle' => 'It is a long established fasact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.',
                        'button_text' => 'diet',
                        'placement' => 'about_t',
                        'link' => 'www/links/',
                        'bg_image' => 'images/blog/peas.jpg'
                    ]
                ]
            );
    
    
            DB::table('tags')->insert(
                [
                    ['tag' => 'পালিও'],
                    ['tag' => 'ভিগান'],
                    ['tag' => 'লো-কার্ব'],
                    ['tag' => 'দুকান'],
                    ['tag' => 'আলট্রা লো ফ্যাট'],
                    ['tag' => 'আটকিন'],
                    ['tag' => 'এইচ.সি.জি'],
                    ['tag' => 'জোন'],
                    ['tag' => 'ওজন কমান'],
                    ['tag' => 'ওজন বাড়ান'],
                    ['tag' => 'ডায়বেটিক'],
                    ['tag' => 'টিনেজ'],
                    ['tag' => 'সন্তান'],
                    ['tag' => 'শিশু'],
                    ['tag' => 'রোজা'],
                    ['tag' => 'শর্ট ডায়েট'],
                    ['tag' => 'স্থুলতা'],
                    ['tag' => 'শুকনো'],
                    ['tag' => 'মোটা'],
                ]
            );
    
            DB::table('categories')->insert(
                [
                    [
                        'category' => 'ডায়েট'
                    ],
                    [
                        'category' => 'ডায়বেটিক'
                    ],
                    [
                        'category' => 'সাস্থ্য বিষয়ক টিপস'
                    ],
                    [
                        'category' => 'বয়ঃসন্ধি'
                    ],
                    [
                        'category' => 'স্থূলতা'
                    ]
    
                ]
            );
    
    
            $img = array_diff(scandir(public_path('/assets/frontend/images/blog/')), array('....', '...', '..', '.'));
    
            DB::table('blogs')->insert(
                [
                    [
                        'id' => 1,
                        'title' => 'অ্যালার্জির কারণ ও প্রতিকার',
                        'article' => "পরিবেশে অবস্থিতি কতগুল বস্তুর উপস্থিতি যা কিছু কিছু মানব দেহের প্রতিরক্ষাতন্ত্রের অতিসংবেদনশীলতার কারণে সৃষ্টি হয় যা দেহে বিরূপ প্রক্রিয়াকে বুঝায় । এই বস্তুগুলি অধিকাংশ ব্যাক্তির সাধারণত কোন সমস্যা করেনা এই বিরূপ প্রক্রিয়াগুলিকে একত্রে অ্যালার্জি বলে উদাহরণঃ হে জ্বর, খাদ্যে অ্যালার্জি, অ্যালার্জিজনিত ত্বকপ্রদাহ  আর এই অ্যালার্জির কারণে সৃষ্টি হয় হাঁপানি, চুলকানিযুক্ত ফুসকুড়ি, চোখ লাল হয়ে যাওয়া , রাইনোরিয়া বা নাকদিয়ে পানি ঝরা, এবং নানান খাদ্যে বিষক্রিয়া সৃষ্টি করা ।
    
                        অ্যালার্জির কারণঃ
                        পোষা প্রাণীর পশম, প্রস্রাব পায়ীখানা ও লালা জাতীয় পদার্থ যেমনঃ বিড়াল , কুকুর ও বিভিন্ন পাখি ।
                        ঘরের ধুলাবালি ও পুরনো কাপড়ে থাকা ময়লা থেকে অ্যালার্জি হয়
                        স্যাঁতস্যাঁতে মাটি ও কার্পেট থেকে বা ভাইরাস ও ব্যাকটেরিয়া দ্বারা হয় ।
                        বিশেষ কোন খাবার খেলে গরুর মাংস, হাঁসের ডিম, পুঁইশাক, কচু শাক ইত্যাদি ।
                        বিভিন্ন মৌসুমে ফুলের পরাগ বা পুষ্পরেণু ও কীটপতঙ্গের হুল এবং ঔষদের তীব্র প্রতিক্রিয়ার কারণে অ্যালার্জি হয় ।
                        হরমোন ইনজেকশন ও চুলে কলপ দিলে হতে পারে ।
                        পিতা-মাতার অ্যালার্জি থকলে সন্তানের অ্যালার্জি হওয়ার সম্ভাবনা থাকে ৬০% । শুধু পিতা অথবা মাতার ক্ষেত্রে সম্ভবনা ৩০% যদি পিতা-মাতা না থাকে তাহলেও ১৫% অ্যালার্জি হতে পারে ।
                        কীটপতঙ্গের কামড়ে স্থানটি ক্ষত হয় ও চুলকায় এবং ফুলে যাই যেমনঃ মশা, বেলেমাছি, মৌমাছি, ভীমরুল, বোলতা ইত্যাদি পতঙ্গের কামড়ে অ্যালার্জি হয় ।
                        Asthma Problem
                        asthma
                        অ্যালার্জির প্রতিকারঃ
                        আমাদের যে সব বস্তুর সংস্পর্শে গেলে অতিসংবেদনশীলতা সৃষ্টি হয় সেসব বস্তুর নিকট যাওয়া থেকে নিজেকে বিরত রাখা ।
                        কিছু কিছু ক্ষেত্রে অতিসংবেদনশীলতার চিকিৎসায় অ্যালাজেরন ইমিউনোথেরাপি ব্যবহার করা হয় ।
                        যাদের অল্পশীতে সর্দি, কাশি , গলা ব্যাথা ইত্যাদি হয় তাদের ঘাবড়ানোর কিছু নেই । বেশী করে পানি পান করলে এবং কিছু স্বাস্থ্য বিধি মেনে চললেই রক্ষা পাওয়া যাই ।
                        দিনে ৩/৪ বার পরম পানির ভাপ নেওয়া ও কমলা লেবু বা পাতি লেবুর রস খেলে উপকার পাওয়া যাবে।
                        তাল মিছরি , লবঙ্গ  অথবা আদা মুখের ভিতর রাখা
                        অ্যালার্জি প্রতিকারে তুলসী বা বাসক পাতার রস মধুর সাথে মিশ্রিত করে খেলে উপকার পাওয়া যায়।
                        ধুলাবালির মধ্যে মার্ক্স ব্যবহার করা ।
                        উপরোক্ত ব্যবস্তায় যদি অবস্থার অবনতি হয় তবে ভালো চিকিৎসকের পরামর্শ নিতে হবে
                        অ্যালার্জি সাধারণত পরিবেশগত কারণে হয় এবং এটা পরিষ্কার পরিচ্ছন্ন পরিবেশে থাকলে এহার উপশম লক্ষ করা যাই ।
                        অধিকংশ মানুষ অতিসংবেদনশীলতায় ভুগছে । উন্নত বিশ্বে প্রায় ২০% মানুষ অতিসংবেদনশীলতাজনিত রাইনাইটিস বা সর্দিতে ভুগছেন । প্রায় ৬% মানুষ অন্তত খাদ্যে অতিসংবেদনশীলতা রয়েছে , ২০% ক্ষেত্রে অ্যাটপিক ডামাটাইটিস হয় । ১-১৮% বাক্তির অ্যাজমা বা হাঁপানি রোগে আক্রান্ত হয় বিভিন্ন দেশে । ০.৫-২% অ্যানাফিল্যাক্রিস হয় । অ্যালার্জি রোগ দিন দিন বাড়ছে এবং এই রোগের সর্বপ্রথম ব্যবহার করা হয় ১৯০৬ সালে ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[2],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'approved',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 2,
                        'title' => 'করোনা ভাইরাস(Coronavirus) ও রোগপ্রতিরোধ ক্ষমতা বৃদ্ধিতে করণীয়',
                        'article' => "বর্তমান সময়টা খুবই অপ্রত্যাশিত । গত ১০০ বছরের মধ্যে মানুষ এরকম পরিস্থিতির মধ্যে পড়েনি । আতঙ্কিত না হয়ে সচেতনার সাথে আমরা আমাদের পরিবার, প্রতিবেশী ও দেশকে রক্ষা করতে পারি । এই অবস্থা আমাদের স্বাস্থ্য ও অর্থনৈতিক ঝুঁকির মধ্যে ফেলেছে । প্রতিদিনই করোনা ভাইরাসে আক্রান্ত হয়ে মৃত্যুর সংখ্যা বাড়ছে । আমরা আশা করছি অল্প সময়ের মধ্যে এই ভাইরাসের ভ্যাক্সিন এবং ঔষধ আবিস্কার হবে । COVID-19 এটা একটা ভাইরাল রোগ যা কিনা পুরো বিশ্বে ছড়িয়ে পড়েছে । পরিসংখ্যান বলছে সারা বিশ্বে ৪০%-৭০% লোক আক্রান্ত হয়েছে এবং ০.৬%-৪% লোক এই ভাইরাসে মৃত্যুবরণ করেছে ।
    
                        Corona-virus
                        ছবিঃ করোনা ভাইরাস (সিডিসি এর ওয়েবসাইট হতে সংগ্রহীত)
                        World Health Organization (WHO) সারা বিশ্বে জরুরী অবস্থা ঘোষণা করেছে । The Centers for Disease Control and Prevention (CDC) মানুষের ভিড় এড়িয়ে চলতে বলেছে । অনেক দেশে স্কুল, মসজিদ, হোটেল বন্ধ করে রেখেছে । মানুষ ঘরে বন্দি হয়ে আছে । নিঃসন্দেহে আমরা একটা বড় ঝুঁকির মধ্যে আছি ।
                        
                        
                        COVID-19 ভাইরাস প্রথম ছড়িয়ে পড়ে চীনের উহান শহরে । ৮ ই এপ্রিল ২০২০ ইং তারিখে জনস হপকিন্স ইউনিভার্সিটি এর তথ্য মতে এটা বিশ্বের ১৮৪ টি দেশের ১৪২৯৪৩৭ মানুষকে আক্রান্ত করেছে এবং যার মধ্যে ৮২০৭৩ মানুষ ইতিমধ্যে মৃত্যুবরণ করেছে । এই ভাইরাসে সবচেয়ে বেশি ঝুঁকিতে আছে বয়স্ক মানুষ, হার্ট, কিডনি, ডায়াবেটিক ও কান্সারে আক্রান্ত মানুষ । আশা করা যাচ্ছে গ্রীষ্মকালে এটা কমে যাবে কিন্তু শীতের শুরুতে মানে নভেম্বরে এটার প্রকট আবার বাড়তে পারে । যেমন- ১৯১৮ সালের স্প্যানিশ ফ্লু এর মত ।
                        
                        # কিভাবে আমরা ইনফেকশন এড়িয়ে চলতে পারিঃ
                        • ভিড় এড়িয়ে চলা, হাত না মেলানো, ৬ ফিট দূরত্বে থাকা এবং সম্ভব হলে বাসায় বসে কাজ করা ।
                        • পরিস্কার পরিচ্ছন্ন থাকা , ২০-৩০ সেকেন্ড হাত সাবান দিয়ে ধোয়া । হ্যান্ড স্যানিটাইজার ব্যবহার করা, বার বার নাকে, চোখে মুখে হাত না দেয়া ।
                        
                        # কিভাবে রোগ প্রতিরোধ ক্ষমতা (Immune System) বাড়বেঃ
                        • প্রাকৃতিক ও পুষ্টিকর খাবার যেমন- শাক সবজি ফলমূল খাওয়া। প্রতিদিন ৫-৮ কাপ সবজি খাওয়া ও ২টা ফল খাওয়া ।
                        • চিনি এবং রিফাইন কার্ব পরিহার করা ।
                        • সামুদ্রিক মাছ ও প্রাকৃতিক খাবার খেয়ে বেড়ে ওঠা মুরগি ও গরুর মাংস খাওয়া । বিভিন্ন বীজ (Seeds) ও ডাল খাওয়া ।
                        • প্রচুর পরিমাণ বিশুদ্ধ পানি পান করা । মুরগি ও সব্জি সুপ খাওয়া । হারবাল চা, যেমনঃ হলুদ, আদা, তুলসি চা । ফলের সরবত (Fruit Juice ) এড়িয়ে চলা ভালো ।
                        • প্রোবায়োটিক (Probiotic)যুক্ত খাবার বেশী খেতে হবে । যেমনঃ চিনি মুক্ত দই, কেফির, কিমচি(Kimchi), ন্যাটো (Natto) ইত্যাদি ।
                        • পরিমিত ঘুমানো । আমরা জানি ভালো ঘুম শরীরের (Healing Power ) রোগ প্রতিরোধ ক্ষমতা ও ভিতরের ক্ষত সারিয়ে তুলতে সাহায্য করে ।
                        • নিয়মিত ব্যায়াম করা । প্রতিদিন ৩০-৪০ মিনিট হাটা , সাঁতার কাটা, ইয়োগা করা । গরম পানি দিয়ে গোসল করা ।
                        • সম্ভব হলে বাগান করা । কারণ মাটির স্পর্শ আমাদের রোগ প্রতিরোধ ক্ষমতা বাড়ায় ।
                        • ডিপ ব্রেথিং ও হোম ম্যাসেজ প্র্যাকটিস করা ।
                        • নেতিবাচক চিন্তা, দুশ্চিন্তা পরিহার করতে হবে । আতংকিত না হয়ে আল্লাহ এর কাছে প্রার্থনা করতে হবে যাতে দ্রুত আমরা এই বিপদ থেকে পরিত্রাণ পায় ।
                        
                        
                        # কি কি ভিটামিন মিনারেল ও হার্ব খেতে হবেঃ
                        • বেশি পরিমাণ ভিটামিন সি । যেমন – আমলকী , আমলকী পাউডার, কামু কামু পাউডার, চেরি পাউডার, লেবু খাওয়া ইত্যাদি । চীনের উহানের ডাক্তারগণ ভিটামিন সি ব্যবহার করে ভালো ফলাফল পেয়েছেন । ভিটামিন সি ইনফেকশন হিল করে ক্যান্সার প্রতিরোধে সাহায্য করে ।
                        • ভিটামিন এ, ডি ৩ + কে ২ , পটাসিয়াম, ম্যাগনেসিয়াম, জিংক, ফিস অয়েল ও প্রোবায়োটিক খেতে হবে ।
                        • রসুন, পেঁয়াজ, আদা, ক্লোভ, ওরেগানো(Oregano), যষ্টিমধু (Licorice), হলুদ, গ্রিন টি, সেইজ (Sage), তুলসি চা খাওয়া । এই খাদ্য গুলি শ্বাসযন্ত্র ও রোগ প্রতিরোধ ক্ষমতা বৃদ্ধিতে সাহায্য করে ।
                        • বিভিন্ন ধরনের মাশরুম খাওয়া । যেমনঃ রিশি(Reishi), শিটেক(Shiitake), তুর্কীটেইল (Turkey tail), করডাইসেপ্স (Cordyceps) মাশরুম ।
                        
                        সর্বোপরি আমরা যদি নিয়মিত প্রার্থনা করি, সাবধানে থাকি, সঠিক নিয়ম মেনে ভালো চিন্তা করে চলি, তাহলে করোনা ভাইরাস কেন যে কোন ধরনের অসুখ থেকে নিজেকে সুস্থ রাখতে পারবো ।
                        
                        এটা কোন ডাক্তারের প্রেসক্রিপশন নয় , জীবন যাত্রার মান উন্নয়নের পরামর্শ । তাই অসুখ হলে ডাক্তারের পরামর্শ নিন ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[3],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'approved',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 3,
                        'title' => 'অনলাইনে টেলি-মেডিসিন সেবা প্রদান করছে ফ্যামিলি কেয়ার হোমিওপ্যাথিক ক্লিনিক',
                        'article' => "অনলাইনে টেলি-মেডিসিন সেবা প্রদান করছে ফ্যামিলি কেয়ার হোমিওপ্যাথিক ক্লিনিক যা রোগীদের সেবা গ্রহণ পদ্ধতিকে আরও সহজ করছে । কোভিড-১৯ মহামারির সময়ে ডাক্তার রোগী সরাসরি সাক্ষাৎ ডাক্তার ও রোগী উভয়ের জন্যই স্বাস্থ্য ঝুকি বৃদ্ধি করছে । তাই এই সময়ে টেলিমেডিসিন সেবা বেশ জনপ্রিয় হয়ে উঠেছে । এর মাধ্যমে রোগীরা বাড়িতে বসে অনলাইনে বিশেষজ্ঞ ডাক্তার এর পরামর্শ গ্রহণ করতে পারছে ।
    
                        করোনা ভাইরাসের প্রাদুর্ভাবের পূর্ব থেকেই ডাক্তার সায়মা রেজোয়ানা ও তার সহযোগী বিশেষজ্ঞগণ অনলাইনে চিকিৎসা পরামর্শ প্রদান করে আসছিলেন । কিন্তু কভিড-১৯ মহামারির সময়ে এই সেবাটি বেশ জনপ্রিয় হয়ে ওঠে । যে কেউ www.drsaymarezoyana.com ওয়েব সাইটে গিয়ে ডাক্তারেরে অ্যাপয়েন্টমেন্ট নিয়ে অনলাইনে চিকিৎসা পরামর্শ ও কুরিয়ারের মাধ্যমে বাড়িতে ওষুধ গ্রহণ করতে পারছেন ।
                        
                        “অনলাইনে টেলি-মেডিসিন সেবা দিন বা দিন আরও জনপ্রিয় হবে বলে বিশেসজ্ঞদের অভিমত । “
                        
                        অনলাইনে ডাক্তারের পরামর্শ গ্রহণের পদ্ধতি:-
                        
                        অনলাইনে ডাক্তারের পরামর্শ গ্রহণ করতে এই ( https://drsaymarezoyana.com/bangla/appointment/ ) লিঙ্কে গিয়ে ফরমটি পূর্ণ করে SUBMIT বাটনে ক্লিক করুণ । তখন আর একটি ফরম আসবে সেখানে দেওয়া প্রশ্ন গুলির উত্তর টিক মার্ক করুণ ।
                        
                        ১ম পাতার প্রশ্নের উত্তর গুলি দেওয়া হয়ে গেলে NEXT বাটন চেপে পরের পাতায় যান এবং এক এক করে সকল প্রশ্নের উত্তর টিক মার্ক করতে থাকুন । একদম শেষের পাতায় আপনার কোন টেস্ট পূর্বে করা থাকলে তার ছবি সংযুক্ত করার অপশন দেখতে পাবেন । এছাড়া সেখানে আপনি আপনার পূর্বের ডাক্তারের প্রেসক্রিপশন ও আক্রান্ত স্থানের ছবি ও আপলোড করতে পারবেন ।
                        
                        সকল প্রশ্নের উত্তর প্রদান করলে ডাক্তারের আপনার অবস্থা ও ভিতরকার সমস্যা বুঝতে ও আপনাকে সঠিক চিকিৎসা পরামর্শ প্রদান করতে সহজ হবে । তাই সকল প্রশ্নের উত্তর টিক মার্ক দিয়ে উত্তর দেবেন ।
                        
                        অনলাইনে ডাক্তারের পরামর্শ গ্রহণের ফিঃ ২০০ টাকা । আমাদের থেকে ওষুধ গ্রহন করলে কুরিয়ার এর মাধ্যমে আপনার ওষুধ আপনার বাসায় পৌঁছে যাবে ( ওষুধের ফি আলাদা প্রদান করতে হবে । আপনি চাইলে অনলাইনে শুধু প্রেসক্রিপশন নিয়ে ফার্মেসী থেকে ও ওষুধ সংগ্রহ করতে পারবেন ) ।
                        
                        ঢাকার ভিতর ওষুধ কুরিয়ারের মাধ্যমে প্রেরণের ফি ৬৫ টাকা । ঢাকার বাইরের ১৫০ টাকা ।
                        
                        আপনার সকল তথ্য অনলাইনে প্রদানের পর ডাক্তারের অ্যাপয়েন্টমেন্ট নিশ্চিত করতে বিকাশের মাধ্যমে ফি (২০০ টাকা ) সেন্ড মানি এর মাধ্যমে জমা দিন এই নাম্বারে ( বিকাশ পারসোনাল নং- ০১৯১৪২২০৫৫০ ) ।
                        
                        যে কোন জরুরী প্রয়োজনে কল করুণ এই নাম্বারে ০১৬১৬ ৫৬৭ ৫৬৭ । আমাদের WhatsApp নাম্বার ০১৬১৬ ৫৬৭ ৫৬৭ ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[4],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'pending',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 4,
                        'title' => 'গ্যাস্ট্রিকের কারন ও প্রতিকার',
                        'article' => "আমাদের দক্ষিণ -পূর্ব এশিয়ায় গ্যাস্ট্রিকের সমস্যাটা বেশি তা ছাড়া এদেশে ভেজাল খাদ্যের কারণে ছোটবড় বিভিন্ন বয়সের মানুষের গ্যাস্ট্রিকের সমস্যা দেখা যায় । গ্যাস্ট্রিক একটি মারাত্নক রোগ সময় মত খাদ্য-খাবার নাখায়ার কারণে এটি হয় । তাই আমাদের সময় মত খাদ্য খাবার গ্রহন করতে হবে ।
    
                        অধিক তেল, চর্বি যুক্ত খাবার খাদ্য তালিকা থেকে বাদ দিন ।
                        
                        গ্যাস্ট্রিক একটি মারাত্নক রোগ সময় মত খাদ্য-খাবার নাখায়ার কারণে এটি হয় । তাই আমাদের সময় মত খাদ্য খাবার গ্রহন করতে হবে ।
                        
                        
                        গ্যাস্ট্রিকের কারনঃ
                        অনেক সময় পেট খালি থকলে পেট ব্যাথা করে এবং গ্যাস্ট্রিকের সমস্যা দেখা যায় ।
                        অনেক সময় তেল চর্বি জাতীয় খাবার বেশি খেলে পেটের ভিতর ভুর ভুর শব্দ হয় এবং গ্যাস্ট্রিকের হয় ।
                        ধূমপান করলে হজম শক্তি হ্রাস পাই এবং মুখ দিয়ে গন্ধ বের হয়
                        সময় মত খাবার না খেলে পেটে গ্যাস্ট্রিকের সমস্যা দেখা যায় ।
                        গ্যাস্ট্রিকের আর একটা বড় কারন হল বেশি রাত করে খাবার খাওয়া ও সাথে সাথে ঘুমিয়ে পড়া ।
                         আমরা অনেক সময় পাওয়ারফুল ব্যাথা নাশক ওষুধ খাই কিন্তু সাথে গ্যাসের ওষুধ না খাওয়ার কারণে ।
                        খালিপেটে চা অথবা এসিড জাতীয় ফল খেলে গ্যাস্ট্রিকের সমস্যা দেখা দেয় ।
                        কম কম পানি পান করার কারণে ও গ্যাস্ট্রিক হয় ।
                        গ্যাস্ট্রিকের প্রতিকারঃ
                        আমরা অধিক তেল, চর্বি যুক্ত খাবার খাদ্য তালিকা থেকে বাদ দিব অথবা কম পরিমান খাব ।
                        বেশী বেশী পানি পান করব ও দীর্ঘ সময় পেট খালি রাখবো না অল্পকিছু খেলেও খেতে হবে ।
                        প্রতিদিন সঠিক সমায়ে ভারী খাবার খেতে হবে ।
                        ধূমপান থেকে বিরত থাকতে হবে এবং ব্যাথা নাশক ওষুধের সাথে গ্যাসের ওষুধ খেতে হবে ।
                        খালি পেটে এসিড জাতীয় ফল না খাওয়া ভালো ।
                        রাতে খাবারের পর একটু হাঁটাহাঁটি করা ও দূরত ঘুমিয়ে পড়া ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[5],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'y',
                        'status' => 'approved',
                        'user_id' => 12,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 5,
                        'title' => 'কী কারনে পাইলস হয় এবং ইহার আরোগ্য',
                        'article' => "পাইলসকে চিকিৎসা বিজ্ঞানের ভাষায় হেমরোয়েডস (Hemorrhoids) বলে । মলদ্বারের নিচের অংশে এক ধরণের রক্তের গুচ্ছ–যেটা আঙ্গুরের মত ফুলে যায়, ফলে মল ত্যাগ করলে বা মল ত্যাগ না করলেও  সেখান থেকে প্রায়ই রক্তপাত হয় । তাকে পাইলস বলে ।
    
                        দীর্ঘদিনের পাইলস ক্যান্সারের কারন হয়
                        
                        কী কারনে পাইলস হয়ঃ
                        সাধারণত কোষ্ঠকাঠিন্য থেকে পাইলস এর জন্ম হয়। যারা দীর্ঘদিন ধরে কোষ্ঠকাঠিন্যতাই ভুগছেন তাদের পাইলস হওয়ার সম্ববনা ৯০% । অনেক সময় বাচ্চাদের গর্ভবস্থায় এটা বেশি হয় । আবার অনেকে যথাসময়ে মল ত্যাগ করেনা আটকে রাখেন এসব কারণেও পাইলস হয় ।  এছাড়া সাধারন কারনে হতে পারে । 
                        
                        
                        পাইলস এর আরোগ্যঃ
                        প্রথমে শরীর থেকে কোষ্ঠকাঠিন্য দূর করতে হবে ,সেজন্য প্রচুর পরিমানে সবুজ শাকসবজি খেতে হবে  এবং পানি পান করতে হবে । আমাদের  আঁশজাতীয় খাবার খাওয়া উচিত । প্রতিদিন মলত্যাগের অভ্যাস করতে হবে । কোন ধরণের অনিয়ম দেখাদিলে সাথে সাথে একজন বিশেষজ্ঞ চিকিৎসকের কাছে যেতে হবে ।
                        
                        দীর্ঘদিনের পাইলস ক্যান্সারের কারন হয় এবং পাইলস এর ভুল চিকিৎসায় আরো  জটিল রুপ ধারন করে ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[6],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'y',
                        'status' => 'approved',
                        'user_id' => 12,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 6,
                        'title' => 'কেন কিডনিতে পাথর হয় ? এর প্রতিকার কি ?',
                        'article' => "কিডনিতে পাথরঃ 
                        কিডনিতে পাথর কিডনির রোগ গুলোর মধ্যে অন্যতম। প্রতিবছরই আমাদের দেশে কিডনির পাথর জনিত কারণে অনেকের কিডনি নষ্ট হয়ে যায়। বিভিন্ন কারণে কিডনিতে এই পাথর হয়ে থাকে। একটু সচেতন হলেই কিডনির পাথর প্রতিরোধ করা সম্ভব।
                        
                        কিডনিতে পাথরের লক্ষণঃ
                         পিঠে, দুই পাশে এবং পাঁজরের নিচে ব্যথা হওয়া ও তলপেট এবং কুঁচকিতে ব্যথা ছড়িয়ে যাওয়া
                         প্রস্রাব ত্যাগের সময় ব্যথা হওয়া 
                         প্রস্রাবের রঙ গোলাপী, লাল অথবা বাদামী হওয়া
                         বারবার প্রস্রাবের বেগ পাওয়া
                         যদি কোন সংক্রমণ হয়ে থাকে তাহলে জ্বর এবং কাঁপুনী হওয়া
                         বমি বমি ভাব এবং বমি হওয়া 
                        
                        তবে,একেকজনের উপসর্গ একেকভাবে দেখা দিতে পারে। এ লক্ষণগুলোর সবই যে একজনের মধ্যে দেখা দেবে তা নয়। পাথরের আকৃতি এবং কিডনির কোনস্থানে পাথর জমেছে তার উপর উপসর্গগুলো নির্ভর করে। 
                        
                        কিডনিতে পাথর কেন হয়?
                        আমাদের প্রস্রাবে পানি, লবন ও খনিজ পদার্থের সঠিক ভারসাম্য বজায় না থাকলে কিডনিতে পাথর হতে পারে। বিভিন্ন কারণে আমাদের প্রস্রাবের উপাদানের এই ভারসাম্য নষ্ট হতে পারে, যেমন-
                        # প্রয়োজনের চেয়ে কম পরিমান পানি পান করা।
                        # মাত্রাতিরিক্ত আমিষ/প্রোটিন সমৃদ্ধ খাবার গ্রহণ করা।
                        # অতিরিক্ত খাবার লবন (সোডিয়াম সল্ট/টেবিল সল্ট) গ্রহণ।
                        # অতিরিক্ত অক্সালেট সমৃদ্ধ খাবার গ্রহণ যেমন চকলেট।
                        # শরীরের অতিরিক্ত ওজন নিয়ন্ত্রণ করতে না পারা।
                        #অনিয়ন্ত্রিত উচ্চরক্তচাপ অথবা বাতের ব্যথা কিংবা মূত্রাশয়ে প্রদাহের উপযুক্ত চিকিৎসা না করা।
                        
                        চিকিৎসাঃ কিডনিতে পাথর হলেই অপারেশন করতে হয় এমন ধারনা ঠিক নয়। ছোট আকৃতির পাথর সাধারণত প্রস্রাবের সাথে বের হয়ে যায়।
                        
                        মনে রাখা প্রয়োজন, দৈনিক ৮-১০ গ্লাস বিশুদ্ধ পানি পান করলে শরীর থেকে বর্জ্য পদার্থ উপযুক্ত পরিমাণে প্রস্রাবের সঙ্গে বের হয়ে যায় এবং কিডনির পাথরের ঝুঁকি এবং জটিলতা কমিয়ে আনে।
                        লক্ষণ ভিত্তিক হোমিওপ্যাথিক চিকিৎসা নিলে কিডনি পাথর সেরে যায়। ",
                        'img_url' => 'assets/frontend/images/blog/'.$img[7],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'y',
                        'status' => 'pending',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
    
                    [
                        'id' => 7,
                        'title' => 'ক্লোভ এসেনশিয়াল অয়েলের যত উপকারিতা',
                        'article' => "ক্লোভ এসেনশিয়াল অয়েল কি ? :
                        লবঙ্গ থেকে প্রস্তুত হয় এই তেল। এক পৃথক গবেষণায় প্রমাণ মিলেছে, এই এসেনশিয়াল অয়েলের প্রয়োগে টাইপ-২ ডায়াবেটিস নিয়ন্ত্রণ সম্ভব। লবঙ্গের এই তেল অগ্ন্যাশয়ের কয়েকটি নির্দিষ্ট পাচকরসের মাত্রা হ্রাস করে, যা ডায়াবেটিসের সঙ্গে সম্পৃক্ত।
                        ক্লোভ এসেনশিয়াল অয়েলের উপকারিতাঃ
                        ক্লোভ এসেনশিয়াল অয়েল ইনসুলিন মাত্রা বজায় রাখতে সাহায্য করে। ডায়াবেটিস ইনসুলিন তৈরি করে এমন অগ্ন্যাশয়ের কোষগুলি ধ্বংস করে ইমিউন সিস্টেমকে দুর্বল করে তোলে, যা সাধারণভাবে কাজ করার জন্য পর্যাপ্ত ইনসুলিন সারা শরীরে ছড়িয়ে দেয়। পোস্টপেন্ডিয়াল ইনসুলিন এবং গ্লুকোজ প্রতিক্রিয়া প্রক্রিয়াগুলি যখন আপনি ক্লোভ তেল ব্যবহার করেন তখন আরো নিয়ন্ত্রিত হতে থাকে।
                        শুধু যন্ত্রণা উপশমে নয়, উত্তেজক হিসেবেও দারুণ কাজ করে ক্লোভ বার অয়েল।
                        দাঁতে প্রচণ্ড যন্ত্রণা হলে দাঁতের গোড়ায় দিতে হবে ঠিক ১ ফোঁটা ক্লোভ অয়েল। সাথে সাথেই পেয়ে যাবেন আরাম। এছাড়া নিয়মিত টুথপেস্টের সাথে ১ ফোঁটা ক্লোভ অয়েল মিশিয়ে ব্রাশ করলে দাঁত ব্যথার সম্ভাবনা থাকবে না।
                        ব্রণ নির্মূল করার জন্য প্রাকৃতিক প্রতিকার হিসাবে, ৩ ড্রপ তেল নিয়ে নিন এবং ২ চা চামচ কাঁচা মধু দিয়ে মেশান। একসঙ্গে মিশ্রিত করুন এবং স্বাভাবিক হিসাবে আপনার মুখ ধুয়ে নিন।
                        প্রচন্ড মানসিক চাপ মোকাবেলা করার জন্য বিশেষজ্ঞগণ ক্লোভ এসেনশিয়াল অয়েল ব্যবহার করতে বলে।
                        ক্লোভ এসেনশিয়াল অয়েল রক্ত ​​পরিশোধক হিসাবে কাজ করতে পারে আবার রক্ত ​​সঞ্চালনও স্বাভাবিক করতে পারে। এটি রক্ত ​​থেকে বিষাক্ততা নিষ্কাশন করতে সাহায্য করে। সুগন্ধি নির্যাস আপনার রক্তের বিষাক্ত মাত্রা কমাতে পারে এবং শরীরের অ্যান্টিঅক্সিডেন্ট মাত্রা জাগিয়ে তুলতে পারে যা প্লেটলেটগুলিকে আরও বিশুদ্ধ করে এবং প্রতিরক্ষা ব্যবস্থার কাজকে বাড়িয়ে তুলবে।
                        ·উচ্চ রক্তচাপের রোগীদের জন্য ক্লোভ এসেনশিয়াল অয়েল একটি সমাধান। ব্রিটিশ জার্নাল অফ ফার্মাকোলজি-তে প্রকাশিত ২০১৫ সালে প্রকাশিত প্রাণী গবেষণাটি জানায় যে ক্লোভ তেলের মধ্যে পাওয়া ইউজেনল শরীরের প্রধান ধমনীকে প্রসারিত করতে সক্ষম হতে পারে এবং সিস্টেমিক রক্তচাপ কমিয়ে দেয়।
                        ·এই গবেষণায় দেখা যায় যে ইউজেনল মাত্রা নিয়ন্ত্রন করে বিরুদ্ধে লিভার রোগ হতে রক্ষা করতে পারে।
                        লিভার প্রতিরক্ষামূলক সবচেয়ে ভালো তেল ক্লোভ অয়েল।",
    
                        'img_url' => 'assets/frontend/images/blog/'.$img[8],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'draft',
                        'user_id' => 12,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 8,
                        'title' => 'কেন কিডনিতে পাথর হয় ? এর প্রতিকার কি ?',
                        'article' => "কিডনিতে পাথরঃ 
                        কিডনিতে পাথর কিডনির রোগ গুলোর মধ্যে অন্যতম। প্রতিবছরই আমাদের দেশে কিডনির পাথর জনিত কারণে অনেকের কিডনি নষ্ট হয়ে যায়। বিভিন্ন কারণে কিডনিতে এই পাথর হয়ে থাকে। একটু সচেতন হলেই কিডনির পাথর প্রতিরোধ করা সম্ভব।
                        
                        কিডনিতে পাথরের লক্ষণঃ
                         পিঠে, দুই পাশে এবং পাঁজরের নিচে ব্যথা হওয়া ও তলপেট এবং কুঁচকিতে ব্যথা ছড়িয়ে যাওয়া
                         প্রস্রাব ত্যাগের সময় ব্যথা হওয়া 
                         প্রস্রাবের রঙ গোলাপী, লাল অথবা বাদামী হওয়া
                         বারবার প্রস্রাবের বেগ পাওয়া
                         যদি কোন সংক্রমণ হয়ে থাকে তাহলে জ্বর এবং কাঁপুনী হওয়া
                         বমি বমি ভাব এবং বমি হওয়া 
                        
                        তবে,একেকজনের উপসর্গ একেকভাবে দেখা দিতে পারে। এ লক্ষণগুলোর সবই যে একজনের মধ্যে দেখা দেবে তা নয়। পাথরের আকৃতি এবং কিডনির কোনস্থানে পাথর জমেছে তার উপর উপসর্গগুলো নির্ভর করে। 
                        
                        কিডনিতে পাথর কেন হয়?
                        আমাদের প্রস্রাবে পানি, লবন ও খনিজ পদার্থের সঠিক ভারসাম্য বজায় না থাকলে কিডনিতে পাথর হতে পারে। বিভিন্ন কারণে আমাদের প্রস্রাবের উপাদানের এই ভারসাম্য নষ্ট হতে পারে, যেমন-
                        # প্রয়োজনের চেয়ে কম পরিমান পানি পান করা।
                        # মাত্রাতিরিক্ত আমিষ/প্রোটিন সমৃদ্ধ খাবার গ্রহণ করা।
                        # অতিরিক্ত খাবার লবন (সোডিয়াম সল্ট/টেবিল সল্ট) গ্রহণ।
                        # অতিরিক্ত অক্সালেট সমৃদ্ধ খাবার গ্রহণ যেমন চকলেট।
                        # শরীরের অতিরিক্ত ওজন নিয়ন্ত্রণ করতে না পারা।
                        #অনিয়ন্ত্রিত উচ্চরক্তচাপ অথবা বাতের ব্যথা কিংবা মূত্রাশয়ে প্রদাহের উপযুক্ত চিকিৎসা না করা।
                        
                        চিকিৎসাঃ কিডনিতে পাথর হলেই অপারেশন করতে হয় এমন ধারনা ঠিক নয়। ছোট আকৃতির পাথর সাধারণত প্রস্রাবের সাথে বের হয়ে যায়।
                        
                        মনে রাখা প্রয়োজন, দৈনিক ৮-১০ গ্লাস বিশুদ্ধ পানি পান করলে শরীর থেকে বর্জ্য পদার্থ উপযুক্ত পরিমাণে প্রস্রাবের সঙ্গে বের হয়ে যায় এবং কিডনির পাথরের ঝুঁকি এবং জটিলতা কমিয়ে আনে।
                        লক্ষণ ভিত্তিক হোমিওপ্যাথিক চিকিৎসা নিলে কিডনি পাথর সেরে যায়। ",
                        'img_url' => 'assets/frontend/images/blog/'.$img[9],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'y',
                        'status' => 'approved',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 9,
                        'title' => 'কানে সমস্যা ও কান পাকা রোগে করনীয়',
                        'article' => "কান পাকাঃ
                        কান-পাকা রোগের অভিজ্ঞতা অনেকেরই আছে। কিন্তু কান-পাকা রোগকে সাধারণ মামুলি রোগ মনে করেন অনেকেই। যার ফলে নানা স্বাস্থ্য বিপত্তির মুখোমুখি হতে হয় এ রোগে আক্রান্ত ব্যক্তিকে। কানপাকা বলতে আমরা মধ্য-কর্ণের দীর্ঘমেয়াদি সংক্রমণকে বুঝি (csom)। এ রোগের চিকিৎসা ধৈর্য সহকারে গ্রহণ করতে হয়। এটি সারাতে উপদেশ মেনে চলার বিকল্প নেই।
                        
                        
                        কান পাকা রোগটি মূলত দুই ধরনের –
                        (১) সেফ টাইপ (টিউবোটিমপেনিক টাইপ), সাধারণত এটাতে তেমন কোনো জটিলতা দেখা যায় না। কানের পর্দার টানটান অংশটি ফুটো হয়ে যায়। আর ফুটো হবার কারণে কান দিয়ে পুঁজ পড়ে থাকে। উল্লেখ্য এ ধরনের কানপাকা রোগই সবচেয়ে বেশি দেখা যায়।
                        
                        (২) আনসেফ টাইপ (এটিকোএন্ট্রাল টাইপ), এই ধরনের কান পাকা রোগ থেকে মারাত্মক জটিলতা সৃষ্টি হতে পারে যা কিনা প্রাণনাশের হুমকিস্বরূপ। যেমন- ব্রেইনএবসেস, ম্যানিনজাইটিস, এনসেফালাইটিস, ফেসিয়াল প্যারালাইসিস ইত্যাদি।
                        
                        কি কি উপসর্গ থাকে?
                        ১. মাঝেমধ্যে কান দিয়ে পুঁজের মতো পড়ে। পানি ঝরে। অনেক সময় ঠাণ্ডা-সর্দি হলেই এই পুঁজ পড়া পুনরায় শুরু হয়ে যায়।
                        ২. কান ব্যথা হতে পারে।
                        ৩. কান চুলকাতে পারে।
                        ৪. কানে কম শোনে।
                        
                        যারা কান পাকা রোগে ভুগছেন তাদের জন্য পরামর্শ-
                        (১) গোছলের সময় অবশ্যই খেয়াল রাখতে হবে যাতে কোনোভাবেই কানে পানি ঢুকতে না পারে। প্রয়োজনে ইয়ারপ্লাগ দিয়ে গোসল করবেন। তা না হলে তুলা তেলে ভিজিয়ে অতিরিক্ত তেল চিপড়িয়ে ফেলে দিয়ে তুলা কানে দিয়ে গোছল করবেন। 
                        (২) পুকুরে/ নদীতে ডুব দিয়ে গোসল করবেন না। 
                        (৩) ফ্রিজের পানি, আইসক্রিম, ঠাণ্ডা পানীয় ইত্যাদি পরিহার করে চলবেন।
                        (৪) অযথা কান খোঁচাখুঁচি করা যাবে না।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[10],
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'approved',
                        'user_id' => 11,
                        'created_at' => now()
    
                    ],
    
                    [
                        'id' => 10,
                        'title' => 'কী কারনে পাইলস হয় এবং ইহার আরোগ্য',
                        'article' => "পাইলসকে চিকিৎসা বিজ্ঞানের ভাষায় হেমরোয়েডস (Hemorrhoids) বলে । মলদ্বারের নিচের অংশে এক ধরণের রক্তের গুচ্ছ–যেটা আঙ্গুরের মত ফুলে যায়, ফলে মল ত্যাগ করলে বা মল ত্যাগ না করলেও  সেখান থেকে প্রায়ই রক্তপাত হয় । তাকে পাইলস বলে ।
    
                        দীর্ঘদিনের পাইলস ক্যান্সারের কারন হয়
                        
                        কী কারনে পাইলস হয়ঃ
                        সাধারণত কোষ্ঠকাঠিন্য থেকে পাইলস এর জন্ম হয়। যারা দীর্ঘদিন ধরে কোষ্ঠকাঠিন্যতাই ভুগছেন তাদের পাইলস হওয়ার সম্ববনা ৯০% । অনেক সময় বাচ্চাদের গর্ভবস্থায় এটা বেশি হয় । আবার অনেকে যথাসময়ে মল ত্যাগ করেনা আটকে রাখেন এসব কারণেও পাইলস হয় ।  এছাড়া সাধারন কারনে হতে পারে । 
                        
                        
                        পাইলস এর আরোগ্যঃ
                        প্রথমে শরীর থেকে কোষ্ঠকাঠিন্য দূর করতে হবে ,সেজন্য প্রচুর পরিমানে সবুজ শাকসবজি খেতে হবে  এবং পানি পান করতে হবে । আমাদের  আঁশজাতীয় খাবার খাওয়া উচিত । প্রতিদিন মলত্যাগের অভ্যাস করতে হবে । কোন ধরণের অনিয়ম দেখাদিলে সাথে সাথে একজন বিশেষজ্ঞ চিকিৎসকের কাছে যেতে হবে ।
                        
                        দীর্ঘদিনের পাইলস ক্যান্সারের কারন হয় এবং পাইলস এর ভুল চিকিৎসায় আরো  জটিল রুপ ধারন করে ।",
                        'img_url' => 'assets/frontend/images/blog/'.$img[11] ,
                        'other_link' => 'google.com,youtube.com',
                        'hyperlink_name' => 'google,youtube',
                        'hand_picked' => 'y',
                        'feautured' => 'n',
                        'status' => 'approved',
                        'user_id' => 12,
                        'created_at' => now()
    
                    ]
                ]
            );
    
    
    
            DB::table('gallery_sections')->insert(
                [
                    [
                        'id' => 1,
                        'position' => 1,
                        'section_name' => 'Events'
                    ],
                    [
                        'id' => 2,
                        'position' => 2,
                        'section_name' => 'Independance Day'
                    ],
                    [
                        'id' => 3,
                        'position' => 3,
                        'section_name' => 'Seminars'
                    ],
                    [
                        'id' => 4,
                        'position' => 4,
                        'section_name' => 'Others'
                    ],
                    [
                        'id' => 5,
                        'position' => 5,
                        'section_name' => 'Uncategories'
                    ]
    
                ]
            );
            $img = array_diff(scandir(public_path('/assets/frontend/images/gallery/')), array('....', '...', '..', '.'));
    
            for ($i = 2; $i < 27; $i++) {
    
    
    
                Gallery::create([
                    
                        'image_url' => $img[$i],
                   
                    
                ]);
            }
    
    
       
            $img = array_diff(scandir(public_path('/assets/frontend/images/events/')), array('....', '...', '..', '.'));
    
    
    
            DB::table('events')->insert(
                [
                    [
    
                        'name' => 'নেড়িবাদী নির্মূল কমিউনিটি',
                        'house_no' => 'ডি-২১',
                        'road_number' => 'রোড # ৩৪',
                        'area' => 'ধানমন্ডি',
                        'district' => 'ঢাকা',
                        'date' => '২০/০৩/২০২১',
                        'time' => 'সন্ধ্যা ৬টা থেকে রাত ১০টা',
                        'c_m_position' => 2,
                        'description' => 'শব্দ গুলো দেখে সকলেই অবাক হয়েছে, এটা বলা বাহুল্য। অনেকেই ভাবছেন, এ সব শব্দের বেশিরভাগটাই নিজে থেকে বানানো। তবে সত্যটা হলো, এর একটাও বানানো নয়। সব গুলোই বাংলা ভাষার অংশ। উৎপত্তি অনুসারে বাংলাভাষার যে শ্রেনীবিভাগ রয়েছে, সেই পাঁচটি শ্রেনী বিভাগের ফলেই জন্ম নিয়েছে এই সকল শব্দ, যার অনেকগুলোই আপনি আপনার এই পর্যন্ত জীবনে একবারও শোনেননি।
    
                        এখানে বেছে বেছে বানান ও গঠনের দিক থেকে ব্যবহার করতে কঠিন, এমন কিছু শব্দ বাছাই করা হয়েছে। এটি একই সাথে আপনার ব্যবহৃত ফন্ট কতোটা নিঁখুত এবং আপনার ষ্ট্যাইলিং কতোটুকু সঠিক হয়েছে, নির্ধারন করতে সহায়তা করবে।',
                        'img_url' => $img[2]
                    ],
                    [
    
                        'name' => 'অরগানিক খাদ্য',
                        'house_no' => 'বাসা নং - ০৯ ',
                        'road_number' => 'রোড নং # ২১',
                        'area' => 'বকুলতলা',
                        'district' => 'জামালপুর',
                        'date' => '০৩/০৪/২০২১',
                        'time' => 'সকাল ৯টা থেকে বিকাল ৫টা',
                        'c_m_position' => 1,
                        'description' => ' অংশ অংশভাক আঁইশ ইঁচড়েপাকা ঈক্ষণ ঈদৃক অংশভাগী জওয়ান অংশাঙ্কিত ইউক্যালিপটাস অংশাবতার হালহদিশ পিতৃতর্পণ টকানো ঈক্ষিত জগজ্জন তকতনামা আঁকুবাঁকু পঁইছা
                        জগঝপ্প পঁহুছা দ্রাবিড়ী আঁকুড়ি ঈদৃক জগদম্বা টঙ্ক অংশিন্‌ জগদ্গৌরী আঁচা তকরার তিলপিটালি গজ-দাঁত অংশু ঈপ্সনীয় পইতা শংকরাভরণ হংসগমন পকড় অংশুধর ঈপ্সু ঈর্ষী
                        জগদ্ধাত্রী আঁজনাই তক্তি শংসনপত্র হংসারূঢ়া দংশল তক্ষক অংশুমান ইকেবানা জগদ্বন্ধু ঈশিত্ব ইক্ষ্বাকু আঁজি অংসকুট টঙ্কক তক্ষণাস্ত্র পকোড়া দংষ্ট্রা শকটিকা হকচকা বঁইচি শকল
                       
                       বংশাঙ্কুর তক্ষণী আঁটকুড় ঈশ্বরদ্বেষী টঙ্কার পক্ববিম্বাধরোষ্ঠী শকারবকার হট্টবিলাসিনী বংশাবতংস ইঙ্গবঙ্গ পক্ষচ্ছেদ দংষ্ট্রাল হঠযোগ অষ্টনাগ পক্ষপাতিতা টনটনানি ঈশ্বরাজ্ঞা বউল   ',
                        'img_url' =>$img[3]
                    ],
                    [
    
                        'name' => 'স্থূলতা ও ডায়বেটিক',
                        'house_no' => 'জি-২১',
                        'road_number' => 'রোড # ৫৬',
                        'area' => 'পাহাড়তলি',
                        'district' => 'চিটাগং',
                        'date' => '২১/০২/২০২১',
                        'time' => 'দুপুর ৩টা থেকে সন্ধ্যা ৬টা',
                        'c_m_position' => 3,
                        'description' => 'আমরা বাংলায় ওয়েব ডেডলপমেন্ট নিয়ে কাজ করতে গিয়ে প্রথম যে সমস্যাটার মুখোমুখি হই, সেটা হলো, বাংলা ডেমো টেক্সট। ইংরেজির জন্য lorem ipsum তো আছে । বাংলার জন্য কি আছে? সেই ধারনা থেকেই বাংলা ডেমো টেক্সট তৈরীর চেষ্টা। HTML এর প্রয়োজনীয় প্রায় সব ফরম্যাটেই বাংলা ডেমো টেক্সট তুলে ধরা হয়েছে। আশা করছি, এরি ক্ষুদ্র প্রচেষ্টা আপনাদের কাজে আসবে।',
                        'img_url' => $img[4]
                    ]
                ]
            );
    
    
            DB::table('feedbacks')->insert(
                [
    
                    [
                        'admin_id' => 1,
                        'user_reply' => 'I am user 2',
                        'admin_reply' => 'Admin replies to ID:2',
                        'patient_id' => 2
                    ],
                    [
                        'admin_id' => 1,
                        'user_reply' => 'I am user 3',
                        'admin_reply' => 'Admin replies to ID:3',
                        'patient_id' => 3
                    ],
                    [
                        'admin_id' => 1,
                        'user_reply' => 'I am user 4',
                        'admin_reply' => 'Admin replies to ID:4',
                        'patient_id' => 4
                    ],
                    [
                        'admin_id' => 1,
                        'user_reply' => 'I am user 5',
                        'admin_reply' => 'Admin replies to ID:5',
                        'patient_id' => 5
                    ],
    
                ]
    
            );
    
    
    
            DB::table('sicks')->insert(
                [
                    [
                        'id' => 1,
                        'name' => 'জ্বর',
                        'category' => 'common',
    
    
                    ],
                    [
                        'id' => 2,
                        'name' => 'ঠাণ্ডা',
                        'category' => 'common',
    
                    ],
                    [
                        'id' => 3,
                        'name' => 'সব সময় শরীর খারাপ লাগা',
                        'category' => 'common',
    
                    ],
                    [
                        'id' => 4,
                        'name' => 'সব সময় ক্লান্তি অনুভব করা',
                        'category' => 'common',
    
                    ],
                    [
                        'id' => 5,
                        'name' => 'ওজন বৃদ্ধি',
                        'category' => 'common',
    
                    ],
                    [
                        'id' => 6,
                        'name' => 'ওজন কমে যাওয়া',
                        'category' => 'common',
    
                    ],
                    [
                        'id' => 7,
                        'name' => 'বুকে ব্যাথা',
                        'category' => 'heart_and_blood',
                    ],
                    [
                        'id' => 8,
                        'name' => 'বুক ধড়ফড় করা',
                        'category' => 'heart_and_blood',
                    ],
                    [
                        'id' => 9,
                        'name' => 'হৃদ স্পন্দন স্বাভাবিকের চেয়ে বেশি',
                        'category' => 'heart_and_blood',
                    ],
                    [
                        'id' => 10,
                        'name' => 'হৃদ স্পন্দন স্বাভাবিকের চেয়ে কম',
                        'category' => 'heart_and_blood',
    
                    ],
                    [
                        'id' => 11,
                        'name' => 'ব্যায়াম করলে পায়ে ব্যাথা হয়',
                        'category' => 'heart_and_blood',
    
                    ],
                    [
                        'id' => 12,
                        'name' => 'পা ফোলা ভাব',
                        'category' => 'heart_and_blood',
    
                    ],
                    [
                        'id' => 13,
                        'name' => 'জয়েন্টে ব্যাথা',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 14,
                        'name' => 'ঘাড়ে ব্যাথা',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 15,
                        'name' => 'জয়েন্ট ফুলে যাওয়া',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 16,
                        'name' => 'জয়েন্ট শক্ত হয়ে যাওয়া',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 17,
                        'name' => 'পেশিতে ব্যাথা',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 18,
                        'name' => 'পিঠ ব্যাথা',
                        'category' => 'musculoskeletal',
    
                    ],
                    [
                        'id' => 19,
                        'name' => 'অসাড়তা',
                        'category' => 'nervous_system',
    
    
                    ],
                    [
                        'id' => 20,
                        'name' => 'দূর্বলতা',
                        'category' => 'nervous_system',
    
    
                    ],
                    [
                        'id' => 21,
                        'name' => 'মাথা ঘুরা',
                        'category' => 'nervous_system',
    
    
    
                    ],
                    [
                        'id' => 22,
                        'name' => 'অজ্ঞান',
                        'category' => 'nervous_system',
    
                    ],
                    [
                        'id' => 23,
                        'name' => 'বিভ্রান্তি',
                        'category' => 'nervous_system',
    
                    ],
                    [
                        'id' => 24,
                        'name' => 'মাথা ব্যাথা',
                        'category' => 'nervous_system',
    
                    ],
                    [
                        'id' => 25,
                        'name' => 'চোখে ব্যাথা',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 26,
                        'name' => 'লাল চোখ',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 27,
                        'name' => 'দৃষ্টি শক্তির সমস্যা',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 28,
                        'name' => 'চোখ দিয়ে কেতুর বের হওয়া',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 29,
                        'name' => 'শুষ্ক চোখ',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 30,
                        'name' => 'চোখ চুলকায়',
                        'category' => 'eye',
    
                    ],
                    [
                        'id' => 31,
                        'name' => 'কানে ব্যাথা',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 32,
                        'name' => 'কানে কম শোনা',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 33,
                        'name' => 'নাক দিয়ে রক্ত পড়া',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 34,
                        'name' => 'নাক দিয়ে পানি পড়া',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 35,
                        'name' => 'নাক দিয়ে শ্লেষ্মা বের হওয়া',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 36,
                        'name' => 'চোখ চুলকায়',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 37,
                        'name' => 'গলা ব্যাথা',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 38,
                        'name' => 'কর্কশতা',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 39,
                        'name' => 'নাক ডাকা',
                        'category' => 'nose_ear_throat',
    
                    ],
                    [
                        'id' => 40,
                        'name' => 'ঘা',
                        'category' => 'skin',
    
                    ],
                    [
                        'id' => 41,
                        'name' => 'ফুসকুড়ি',
                        'category' => 'skin',
    
                    ],
                    [
                        'id' => 42,
                        'name' => 'চুলকানি',
                        'category' => 'skin',
    
                    ],
                    [
                        'id' => 43,
                        'name' => 'তিলের পরিবর্তন',
                        'category' => 'skin',
    
                    ],
                    [
                        'id' => 44,
                        'name' => 'অস্বাভাবিক বৃদ্ধি',
                        'category' => 'skin',
    
                    ],
                    [
                        'id' => 45,
                        'name' => 'Erection problems',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 46,
                        'name' => 'অন্ডকোষে পিণ্ড',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 47,
                        'name' => 'লিঙ্গ থেকে স্রাব',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 48,
                        'name' => 'স্তনে পিন্ড',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 49,
                        'name' => 'স্তনবৃন্ত স্রাব',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 50,
                        'name' => 'অস্বাভাবিক স্তনবৃন্ত ময়লা',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 51,
                        'name' => 'অনিয়মিত রক্তক্ষরণ',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 52,
                        'name' => 'bad cramps',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 53,
                        'name' => 'শ্রোণী ব্যাথা',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 54,
                        'name' => 'যৌন মিলনের সময় ব্যাথা হওয়া',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 55,
                        'name' => 'প্রসাব শেষে জ্বালা পোড়া',
                        'category' => 'reproductive',
    
                    ],
                    [
                        'id' => 56,
                        'name' => 'কাশি',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 57,
                        'name' => 'শ্বাসকষ্ট',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 58,
                        'name' => 'শ্বাসনালীতে আংশিক প্রতিবন্ধকতা',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 59,
                        'name' => 'ব্যায়াম করার সময় শ্বাস কষ্ট',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 60,
                        'name' => 'শুয়ে থাকার সময় শ্বাস কষ্ট',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 61,
                        'name' => 'নাক ডাকা',
                        'category' => 'breathing',
    
                    ],
                    [
                        'id' => 62,
                        'name' => 'পেট ব্যাথা',
                        'category' => 'gastrontestinal',
    
                    ],
                    [
                        'id' => 63,
                        'name' => 'পেট খারাপ',
                        'category' => 'gastrontestinal',
    
                    ],
                    [
                        'id' => 64,
                        'name' => 'বমি',
                        'category' => 'gastrontestinal',
    
    
    
                    ],
                    [
                        'id' => 65,
                        'name' => 'ডায়রিয়া',
                        'category' => 'gastrontestinal',
    
    
    
                    ],
                    [
                        'id' => 66,
                        'name' => 'কোষ্ঠ কাঠিন্য',
                        'category' => 'gastrontestinal',
    
                    ],
                    [
                        'id' => 67,
                        'name' => 'বুক জ্বালা',
                        'category' => 'gastrontestinal',
    
                    ],
                    [
                        'id' => 68,
                        'name' => 'মল রক্ত',
                        'category' => 'gastrontestinal',
    
                    ],
                    [
                        'id' => 69,
                        'name' => 'নিজের বা অন্যের ক্ষতি করার চিন্তাভাবনা',
                        'category' => 'psychiatric',
    
    
                    ],
                    [
                        'id' => 70,
                        'name' => 'ঘুমের সমস্যা',
                        'category' => 'psychiatric',
    
    
                    ],
                    [
                        'id' => 81,
                        'name' => 'দুশ্চিন্তা',
                        'category' => 'psychiatric',
    
    
                    ],
                    [
                        'id' => 82,
                        'name' => 'বিষণ্ণতা',
                        'category' => 'psychiatric',
    
    
                    ],
                    [
                        'id' => 83,
                        'name' => 'ব্যাক্তিতবের পরিবর্তন',
                        'category' => 'psychiatric',
    
                    ],
                    [
                        'id' => 84,
                        'name' => 'আবেগ সম্পর্কিত সমস্যা',
                        'category' => 'psychiatric',
    
                    ],
                    [
                        'id' => 85,
                        'name' => 'সামান্য আঘাতেই রক্তপাত হয়',
                        'category' => 'blood',
    
                    ],
                    [
                        'id' => 86,
                        'name' => 'অল্পতেই ঘা হয়',
                        'category' => 'blood',
    
                    ],
                    [
                        'id' => 87,
                        'name' => 'গাড়ের দিকের গ্রন্থি গুলো ফোলা',
                        'category' => 'blood',
    
                    ],
    
                    [
                        'id' => 88,
                        'name' => 'গরম ঝলকানি',
                        'category' => 'endocrine',
    
                    ],
    
                    [
                        'id' => 89,
                        'name' => 'পেশী দূর্বলতা',
                        'category' => 'endocrine',
    
                    ],
    
                    [
                        'id' => 90,
                        'name' => 'স্বর পরিবর্তন',
                        'category' => 'endocrine',
    
                    ],
    
                    [
                        'id' => 91,
                        'name' => 'সাধারন শারীরিক পরিবর্তন',
                        'category' => 'endocrine',
    
                    ],
    
                    [
                        'id' => 92,
                        'name' => 'সাধারণ শারীরিক দূর্বলতা',
                        'category' => 'endocrine',
    
                    ],
    
                    [
                        'id' => 93,
                        'name' => 'প্রাস্রাব করার সময় ব্যাথা হয়',
                        'category' => 'genital_and_urinary',
    
                    ],
    
                    [
                        'id' => 94,
                        'name' => 'অস্বাভাবিক প্রস্রাব',
                        'category' => 'genital_and_urinary',
    
                    ],
    
                    [
                        'id' => 95,
                        'name' => 'রাতে প্রায় সময় প্রস্রাব করা হয়',
                        'category' => 'genital_and_urinary',
    
                    ],
    
                    [
                        'id' => 96,
                        'name' => 'তিলের পরিবর্তন',
                        'category' => 'genital_and_urinary',
    
    
                    ],
    
                    [
                        'id' => 97,
                        'name' => 'যৌনাঙ্গে ঘা',
                        'category' => 'genital_and_urinary',
    
    
                    ]
    
                ]
            );
    
    
            DB::table('sick_user')->insert(
                [
                    [
                        'sick_id' => 1,
                        'user_id' => 3,
    
                    ],
                    [
                        'sick_id' => 2,
                        'user_id' => 3,
                    ],
    
                    [
                        'sick_id' => 5,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 7,
                        'user_id' => 3,
                    ],
                    [
                        'sick_id' => 8,
                        'user_id' => 3,
                    ],
    
                    [
    
                        'sick_id' => 12,
                        'user_id' => 3,
                    ],
    
                    [
    
                        'sick_id' => 17,
                        'user_id' => 3,
    
                    ],
                    [
    
                        'sick_id' => 18,
                        'user_id' => 3,
    
                    ],
    
                    [
    
                        'sick_id' => 20,
                        'user_id' => 3,
    
                    ],
                    [
    
                        'sick_id' => 21,
                        'user_id' => 3,
    
                    ],
    
                    [
    
                        'sick_id' => 26,
                        'user_id' => 3,
    
                    ],
    
                    [
    
                        'sick_id' => 29,
                        'user_id' => 3,
    
                    ],
                    [
    
                        'sick_id' => 51,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 56,
                        'user_id' => 3,
    
                    ],
                    [
                        'sick_id' => 57,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 67,
                        'user_id' => 3,
    
                    ],
                    [
                        'sick_id' => 64,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 66,
                        'user_id' => 3,
    
                    ],
                    [
                        'sick_id' => 67,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 81,
                        'user_id' => 3,
    
                    ],
                    [
                        'sick_id' => 82,
                        'user_id' => 3,
    
                    ],
    
                    [
                        'sick_id' => 89,
                        'user_id' => 3,
    
                    ],
    
    
                    [
                        'sick_id' => 97,
                        'user_id' => 3,
                    ]
    
                ]
            );
    
    
    
            DB::table('notes_from_doctors')->insert(
                [
                    [
                        'id' => 1,
                        'note' => 'ব্যান্ডউইথ হিসাবে perspiciatis Unde অমনিস ইষ্টে জন্মগ্রহণ করেন ত্রুটি বসতে voluptatem Accusantium doloremque laudantium, totam REM aperiam, eaque ipsa যা AB illo inventore veritatis এবং আপাতদৃষ্টিতে architecto beatae Vitae dicta এখানে explicabo। নিমো জন্য ipsam voluptatem quia voluptas বসতে aspernatur বা odit বা চলিয়া যায়, কিন্তু quia ফলস্বরূপ ম্যাগনি ডলোরেস ইওস কুই রেশন ভলুপটেম সিকুই নেসিয়েন্ট। , কুইস নস্ট্রাম এক্সারসাইজেশন উল্লাম কর্পোরিস সাস্কিপিট লেবারিওসাম, নিসি ইউটি অ্যালিকুইড এক্স ইএ কমোডি ফল?vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? '
                    ],
                    [
                        'id' => 2,
                        'note' => 'কিন্তু আমি আপনাকে ব্যাখ্যা করতে চাই কিভাবে আনন্দকে নিন্দা করা এবং যন্ত্রণার প্রশংসা করার এই ভুল ধারণাটি জন্ম নিয়েছিল এবং আমি আপনাকে সিস্টেমের একটি সম্পূর্ণ বিবরণ দেব এবং সত্যের মহান গবেষকের প্রকৃত শিক্ষাকে ব্যাখ্যা করব, এর মাস্টার-নির্মাতা মানুষের সুখ। কেউই আনন্দকে প্রত্যাখ্যান, অপছন্দ বা এড়িয়ে যায় না, কারণ এটি আনন্দ, কিন্তু কারণ যারা আনন্দকে অনুসরণ করতে জানে না তারা যুক্তিসঙ্গতভাবে এমন পরিণতির মুখোমুখি হয় যা অত্যন্ত বেদনাদায়ক। নিজেরই ব্যথা পান, কারণ এটি ব্যথা, কিন্তু কারণ মাঝে মাঝে এমন পরিস্থিতি দেখা দেয় যেখানে পরিশ্রম এবং ব্যথা তাকে কিছুটা আনন্দ দিতে পারে।এটা থেকে কিছু সুবিধা পাওয়া ছাড়া? কিন্তু এমন কোন ব্যক্তির দোষ খুঁজে বের করার অধিকার কার আছে, যিনি এমন আনন্দ উপভোগ করতে পছন্দ করেন যার কোন বিরক্তিকর পরিণতি নেই, অথবা যে ব্যথাকে এড়িয়ে যায় যার ফলে কোন আনন্দ নেই?'
                    ],
                    [
                        'id' => 3,
                        'note' => 'অন্যদিকে, আমরা ধার্মিক রাগ এবং অপছন্দকারী পুরুষদের সাথে নিন্দা জানাই যারা মুহূর্তের আনন্দের মোহ দ্বারা এতটা প্রতারিত এবং হতাশ হয়ে পড়ে, আকাঙ্ক্ষায় অন্ধ হয়ে যায় যে তারা যে যন্ত্রণা ও কষ্টের পূর্বাভাস দিতে পারে না; এবং সমান ইচ্ছার দুর্বলতার মাধ্যমে যারা তাদের কর্তব্যে ব্যর্থ হয় তাদের দোষ দেওয়া হয়, যা পরিশ্রম এবং ব্যথা থেকে সঙ্কুচিত হওয়ার মতোই। এই ঘটনাগুলি একেবারে সহজ এবং আলাদা করা সহজ। যখন আমাদের যা ভালো লাগে তা করতে আমাদের কিছুই করতে বাধা দেয় না, তখন প্রতিটি আনন্দকে স্বাগত জানানো হয় এবং প্রতিটি যন্ত্রণা এড়ানো হয়। এবং বিরক্তি গৃহীত হয়।অতএব জ্ঞানী ব্যক্তি সবসময় এই বিষয়গুলোকে নির্বাচনের এই নীতির সাথে ধরে রাখেন: তিনি অন্য বৃহত্তর আনন্দ লাভের জন্য আনন্দকে প্রত্যাখ্যান করেন, নতুবা খারাপ যন্ত্রণা এড়াতে তিনি যন্ত্রণা সহ্য করেন।'
                    ],
                    [
                        'id' => 4,
                        'note' => 'Lorem Ipsum je demonstrativní výplňový text používaný v tiskařském a knihařském průmyslu. Lorem Ipsum je považováno za standard v této oblasti už od začátku 16. století, kdy dnes neznámý tiskař vzal kusy textu a na jejich základě vytvořil speciální vzorovou knihu. Jeho odkaz nevydržel pouze pět století, on přežil i nástup elektronické sazby v podstatě beze změny. Nejvíce popularizováno bylo Lorem Ipsum v šedesátých letech 20. století, kdy byly vydávány speciální vzorníky s jeho pasážemi a později pak díky počítačovým DTP programům jako Aldus PageMaker.'
                    ],
                    [
                        'id' => 5,
                        'note' => 'Je obecně známou věcí, že člověk bývá při zkoumání grafického návrhu rozptylován okolním textem, pokud mu dává nějaký smysl. Úkolem Lorem Ipsum je pak nahradit klasický smysluplný text vhodnou bezvýznamovou alternativou s relativně běžným rozložením slov. To jej dělá narozdíl od opakujícího se "Tady bude text. Tady bude text..." mnohem více čitelnějším. V dnešní době je Lorem Ipsum používáno spoustou DTP balíků a webových editorů coby výchozí model výplňového textu. Ostatně si zkuste zadat frázi "lorem ipsum" do vyhledavače a sami uvidíte. Během let se objevily různé varianty a odvozeniny od klasického Lorem Ipsum, někdy náhodou, někdy účelně (např. pro pobavení čtenáře).'
                    ],
                ]
            );
    
            DB::table('histories')->insert(
                [
                    [
                        'id' => 1,
                        'question' => 'আপনার ডায়বেটিক আছে ?',
                        'type' => 'medical'
                    ],
                    [
                        'id' => 2,
                        'question' => 'উচ্চ রক্তচাপ আছে ?',
                        'type' => 'medical'
                    ],
                    [
                        'id' => 3,
                        'question' => 'রক্তে উচ্চ শর্করার সমস্যা আছে ?',
                        'type' => 'medical'
                    ],
                    [
                        'id' => 4,
                        'question' => 'আপনার কি ক্যান্সার আছে ?',
                        'type' => 'medical'
                    ],
                    [
                        'id' => 5,
                        'question' => 'আপনার কি আথ্রাইটিস আছে ?',
                        'type' => 'medical'
                    ],
    
                    [
                        'id' => 6,
                        'question' => 'গত ৬ মাসে হাস্পাতালে ভর্তি হয়েছিলেন ?',
                        'type' => 'medical'
                    ],
                    [
                        'id' => 7,
                        'question' => 'আপনি ধূমপান করেন ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 8,
                        'question' => 'আপনি vaping করেন ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 9,
                        'question' => 'অ্যালকোহলিক পানীয় পান করেন ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 10,
                        'question' => 'আপনি নেশা করেন ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 11,
                        'question' => 'আপনার সর্বোচ্চ শিক্ষাগত যোগ্যতা ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 12,
                        'question' => 'আপনি কি বেকার ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 13,
                        'question' => 'আপনি কি ব্যায়াম করেন ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 14,
                        'question' => 'আপনার বৈবাহিক অবস্থা কি ?',
                        'type' => 'social'
                    ],
                    [
                        'id' => 15,
                        'question' => 'আপনার সন্তান আছে ?',
                        'type' => 'social'
                    ]
    
                ]
            );
    
    
            DB::table('options')->insert(
                [
                    [
                        'id' => 1,
                        'list' => 'হ্যা'
                    ],
                    [
                        'id' => 2,
                        'list' => 'না'
                    ],
                    [
                        'id' => 3,
                        'list' => 'মাঝে মাঝে'
                    ],
                    [
                        'id' => 4,
                        'list' => 'গাঁজা'
                    ],
                    [
                        'id' => 5,
                        'list' => 'কোকেইন'
                    ],
                    [
                        'id' => 6,
                        'list' => 'ওপিয়ড'
                    ],
                    [
                        'id' => 7,
                        'list' => 'অন্যান'
                    ],
                    [
                        'id' => 8,
                        'list' => 'পি.এস.সি'
                    ],
                    [
                        'id' => 9,
                        'list' => 'জে.এস.সি'
                    ],
                    [
                        'id' => 10,
                        'list' => 'এস.এস.সি'
                    ],
                    [
                        'id' => 11,
                        'list' => 'ইন্টারমিডিয়েট'
                    ],
                    [
                        'id' => 12,
                        'list' => 'অনার্স'
                    ],
                    [
                        'id' => 13,
                        'list' => 'মাস্টার্স'
                    ],
                    [
                        'id' => 14,
                        'list' => 'পিএইচডি'
                    ],
                    [
                        'id' => 15,
                        'list' => 'অবসর প্রাপ্ত'
                    ],
                    [
                        'id' => 16,
                        'list' => 'অবিবাহিত'
                    ],
                    [
                        'id' => 17,
                        'list' => 'বিবাহিত'
                    ],
                    [
                        'id' => 18,
                        'list' => 'তালাক হয়েছে'
                    ],
                    [
                        'id' => 19,
                        'list' => 'বিধবা'
                    ]
                ]
            );
    
            DB::table('history_options')->insert(
                [
                    [
                        'id' => 1,
                        'history_id' => 1,
                        'option_id' => 1
                    ],
                    [
                        'id' => 2,
                        'history_id' => 1,
                        'option_id' => 2
                    ],
                    [
                        'id' => 3,
                        'history_id' => 2,
                        'option_id' => 1
                    ],
                    [
                        'id' => 4,
                        'history_id' => 2,
                        'option_id' => 2
                    ],
                    [
                        'id' => 5,
                        'history_id' => 3,
                        'option_id' => 1
                    ],
                    [
                        'id' => 6,
                        'history_id' => 3,
                        'option_id' => 2
                    ],
                    [
                        'id' => 7,
                        'history_id' => 4,
                        'option_id' => 1
                    ],
                    [
                        'id' => 8,
                        'history_id' => 4,
                        'option_id' => 2
                    ],
                    [
                        'id' => 9,
                        'history_id' => 5,
                        'option_id' => 1
                    ],
                    [
                        'id' => 10,
                        'history_id' => 5,
                        'option_id' => 2
                    ],
                    [
                        'id' => 11,
                        'history_id' => 6,
                        'option_id' => 1
                    ],
                    [
                        'id' => 12,
                        'history_id' => 6,
                        'option_id' => 2
                    ],
                    // social 
                    [
                        'id' => 13,
                        'history_id' => 7,
                        'option_id' => 1
                    ],
                    [
                        'id' => 14,
                        'history_id' => 7,
                        'option_id' => 2
                    ],
                    [
                        'id' => 15,
                        'history_id' => 8,
                        'option_id' => 1
                    ],
                    [
                        'id' => 16,
                        'history_id' => 8,
                        'option_id' => 2
                    ],
                    [
                        'id' => 17,
                        'history_id' => 9,
                        'option_id' => 1
                    ],
                    [
                        'id' => 18,
                        'history_id' => 9,
                        'option_id' => 2
                    ],
                    [
                        'id' => 19,
                        'history_id' => 10,
                        'option_id' => 2
                    ],
                    [
                        'id' => 20,
                        'history_id' => 10,
                        'option_id' => 2
                    ],
                    [
                        'id' => 21,
                        'history_id' => 10,
                        'option_id' => 3
                    ],
                    [
                        'id' => 22,
                        'history_id' => 10,
                        'option_id' => 4
                    ],
                    [
                        'id' => 23,
                        'history_id' => 10,
                        'option_id' => 5
                    ],
                    [
                        'id' => 24,
                        'history_id' => 10,
                        'option_id' => 6
                    ],
                    [
                        'id' => 25,
                        'history_id' => 10,
                        'option_id' => 7
                    ],
    
    
    
    
    
    
    
    
    
    
                    [
                        'id' => 26,
                        'history_id' => 11,
                        'option_id' => 8
                    ],
                    [
                        'id' => 27,
                        'history_id' => 11,
                        'option_id' => 9
                    ],
                    [
                        'id' => 28,
                        'history_id' => 11,
                        'option_id' => 10
                    ],
                    [
                        'id' => 29,
                        'history_id' => 11,
                        'option_id' => 11
                    ],
                    [
                        'id' => 30,
                        'history_id' => 11,
                        'option_id' => 12
                    ],
                    [
                        'id' => 31,
                        'history_id' => 11,
                        'option_id' => 13
                    ],
                    [
                        'id' => 32,
                        'history_id' => 11,
                        'option_id' => 14
                    ],
    
    
    
    
    
    
    
    
    
    
    
    
                    [
                        'id' => 33,
                        'history_id' => 12,
                        'option_id' => 1
                    ],
                    [
                        'id' => 34,
                        'history_id' => 12,
                        'option_id' => 2
                    ],
                    [
                        'id' => 35,
                        'history_id' => 12,
                        'option_id' => 15
                    ],
    
    
    
    
                    [
                        'id' => 36,
                        'history_id' => 13,
                        'option_id' => 1
                    ],
                    [
                        'id' => 37,
                        'history_id' => 13,
                        'option_id' => 2
                    ],
    
    
    
                    [
                        'id' => 38,
                        'history_id' => 14,
                        'option_id' => 16
                    ],
                    [
                        'id' => 39,
                        'history_id' => 14,
                        'option_id' => 17
                    ],
                    [
                        'id' => 40,
                        'history_id' => 14,
                        'option_id' => 18
                    ],
                    [
                        'id' => 41,
                        'history_id' => 14,
                        'option_id' => 19
                    ],
                    [
                        'id' => 42,
                        'history_id' => 15,
                        'option_id' => 1
                    ],
                    [
                        'id' => 43,
                        'history_id' => 15,
                        'option_id' => 2
                    ]
    
                ]
            );
    
            DB::table('history_anwsers')->insert(
    
    
                [
                    [
    
                        'user_id' => 3,
                        'history_id' => 1,
                        'option_id' => 1
                    ],
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 2,
                        'option_id' => 2
                    ],
                    [
    
                        'user_id' => 3,
                        'history_id' => 3,
                        'option_id' => 1
                    ],
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 4,
                        'option_id' => 1
                    ],
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 5,
                        'option_id' => 2
                    ],
                    [
    
                        'user_id' => 3,
                        'history_id' => 6,
                        'option_id' => 1
                    ],
    
                    // social 
                    [
    
                        'user_id' => 3,
                        'history_id' => 7,
                        'option_id' => 1
                    ],
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 8,
                        'option_id' => 1
                    ],
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 9,
                        'option_id' => 1
                    ],
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 10,
                        'option_id' => 7
                    ],
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 11,
                        'option_id' => 8
                    ],
    
    
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 12,
                        'option_id' => 2
                    ],
                    [
    
                        'user_id' => 3,
                        'history_id' => 12,
                        'option_id' => 15
                    ],
    
    
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 13,
                        'option_id' => 1
                    ],
    
    
    
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 14,
                        'option_id' => 16
                    ],
    
                    [
    
                        'user_id' => 3,
                        'history_id' => 15,
                        'option_id' => 1
                    ],
    
                ]
    
            );
    
    
            DB::table('pre_made_diet_charts')->insert(
                [
                    [
                        'id' => 1,
                        'name' => 'Premade Diet 1',
                        'age' => '16-25',
                        'sex' => 'Male',
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Premade Diet 2',
                        'age' => '16-25',
                        'sex' => 'Male',
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
    
                        'type' => 'fasting',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Premade Diet 3',
                        'age' => '16-25',
                        'sex' => 'Male',
    
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
    
                        'type' => 'JK',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 4,
                        'name' => 'Premade Diet 4',
                        'age' => '16-25',
                        'sex' => 'Male',
    
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'Regular',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 5,
                        'name' => 'Premade Diet 5',
                        'age' => '25-45',
                        'sex' => 'female',
    
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 6,
                        'name' => 'Premade Diet 6',
                        'age' => '20-35',
                        'sex' => 'unisex',
    
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => 'Bla Bla Blackship',
                    ],
                    [
                        'id' => 7,
                        'name' => 'Premade Diet 7',
                        'age' => '30-50',
                        'sex' => 'Female',
    
                        'diet' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => 'Bla Bla Blackship',
                    ],
                ]
            );
    
    
            DB::table('diets')->insert(
                [
                    [
                        'id' => 1,
                        'name' => ' Diet 1',
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'user_id' => 3,
                        'transaction_id' => 21,
                        'type' => 'keto',
                        'draft' => 'no',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now(),
                        'updated_at' => now()->addDays(3)
                    ],
    
    
    
    
                    [
                        'id' => 2,
                        'name' => ' Diet 2',
                        'draft' => 'no',
                        'user_id' => 3,
                        'transaction_id' => 22,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(2),
                        'updated_at' => now()->addDays(3)
                    ],
                    [
                        'id' => 3,
                        'name' => ' Diet 3',
                        'draft' => 'no',
                        'user_id' => 3,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'transaction_id' => 23,
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(3),
                        'updated_at' => now()->addDays(5)
                    ],
                    [
                        'id' => 4,
                        'name' => ' Diet 4',
                        'draft' => 'no',
                        'user_id' => 3,
                        'transaction_id' => 24,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(4),
                        'updated_at' => now()->addDays(8)
                    ],
                    [
                        'id' => 5,
                        'name' => ' Diet 5',
                        'draft' => 'no',
                        'user_id' => 3,
                        'transaction_id' => 25,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(5),
                        'updated_at' => now()->addDays(9)
                    ],
                    [
                        'id' => 6,
                        'name' => ' Diet 6',
                        'draft' => 'no',
                        'user_id' => 3,
                        'transaction_id' => 26,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(6),
                        'updated_at' => now()->addDays(12)
                    ],
                    [
                        'id' => 7,
                        'name' => ' Diet 7',
                        'draft' => 'yes',
                        'user_id' => 3,
                        'transaction_id' => 27,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(7),
                        'updated_at' => now()->addDays(14)
                    ],
                    [
                        'id' => 8,
                        'name' => ' Diet 8',
                        'draft' => 'yes',
                        'user_id' => 3,
                        'transaction_id' => 28,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(8),
                        'updated_at' => now()->addDays(16)
                    ],
                    [
                        'id' => 9,
                        'name' => ' Diet 9',
                        'draft' => 'yes',
                        'user_id' => 3,
                        'transaction_id' => 29,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'diet_chart' => '{"0": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "সেদ্ধ ডিম (সাদা অংশ), জাম্বুরা, রুটি, ভেজিটেবল সুপ", "time": "সকাল ৮:০০", "amount": "১ টি, ১ বাটি, ২টি, ১ কাপ"}, "1": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "এক কাপ গ্রিন টি চিনি ছাড়া , আপেল U+0030 কমলা", "time": "সকাল ১১:০০", "amount": "কোন ক্যালরি নেই, ১ টি"}, "2": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি,মিক্স্ড ভেজিটেবল, ডাল  U+0030  মাছ ", "time": "দুপুর ২:০০", "amount": "১ কাপ U+0030 ২ টি, ১ বাটি, ১ কাপ U+0030 এক টুকরা"}, "3": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "গ্রিন টি, ক্রিম ছাড়া বিস্কিট", "time": "বিকেল ৫:০০", "amount": "১ কাপ (চিনি ছাড়া), ২টি"}, "4": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ডাবের পানি U+0030 পেস্তা বাদাম", "time": "সন্ধ্যা ৭:০০", "amount": "১ টি  U+0030 ৮-১০ টি"}, "5": {"date": "মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার", "name": "ভাত U+0030 রুটি, সালাদ, সবজি U+0030 টক দই", "time": "রাত ৮:৩০", "amount": "১ কাপ U+0030 ২ টি, ১ কাপ, ১ কাপ U+0030 আধা কাপ"}}
    
                        ',
                        'type' => 'keto',
                        'note' => '
    
    
    
                        ১. প্রতিদিন সকাল, দুপুর এবং রাতের খাবারের পূর্বে ২ গ্লাস ঠান্ডা পানি পান করুন।
                        
                        ২. সকালে খালি পেটে এক টুকরা লেবু এবং আধা চা চমচ মধু হালকা গরম পানিতে মিশিয়ে পান করুন।
                        
                        ৩. সবজির লিস্টে ব্রোকলি, লেটুস, পালং শাক এবং অন্যন্য সবুজ সবজি রাখার চেষ্টা করুন।
                        
                        ৪. রেগুলার সালাদের সাথে অলিভ অয়েল মিশিয়ে নিন। এটি ক্যালরি বার্ণ করতে খুবই উপকারী।
                        
                        ৫. রাতের খাবার ঘুমানোর অন্তত ২ ঘণ্টা আগে খেয়ে ফেলুন।
                        
                        সতর্কতা: দ্রুত ওজন কমানোর চেয়ে আস্তে আস্তে ওজন কমানো ভাল।
                        
                        ',
                        'q_one' => 'ya',
                        'q_two' => 'na',
                        'q_three' => 'yo',
                        'q_four' => 'lo',
                        'created_at' => now()->addDays(9),
                        'updated_at' => now()->addDays(18)
                    ],
                ]
            );
    
    
    
    
    
    
    
    
    
    
            DB::table('diet_records')->insert(
                [
                    [
                        'id' => 1,
                        'user_id' => 3,
                        'transaction_id' => 21,
                        'date_of_submission' => now()->format('d-m-Y'),
                        'diet_id' => 1
                    ],
                    [
                        'id' => 2,
                        'user_id' => 3,
                        'transaction_id' => 22,
                        'date_of_submission' =>  now()->addDay(3)->format('d-m-Y'),
                        'diet_id' => 2
    
                    ],
                    [
                        'id' => 3,
                        'user_id' => 3,
                        'transaction_id' => 23,
                        'date_of_submission' => now()->addDay(4)->format('d-m-Y'),
                        'diet_id' => 3
    
                    ],
                    [
                        'id' => 4,
                        'user_id' => 3,
                        'transaction_id' => 24,
                        'date_of_submission' => now()->addDay(5)->format('d-m-Y'),
                        'diet_id' => 4
    
                    ],
                    [
                        'id' => 5,
                        'user_id' => 3,
                        'transaction_id' => 25,
                        'date_of_submission' => now()->addDay(7)->format('d-m-Y'),
                        'diet_id' => 5
    
                    ],
                    [
                        'id' => 6,
                        'user_id' => 3,
                        'transaction_id' => 26,
                        'date_of_submission' =>  now()->addDay(7)->format('d-m-Y'),
                        'diet_id' => 6
    
                    ],
                    [
                        'id' => 7,
                        'user_id' => 3,
                        'transaction_id' => 27,
                        'date_of_submission' =>  now()->addDay(9)->format('d-m-Y'),
                        'diet_id' => 7
    
                    ],
                ]
            );
    
            DB::table('attached_pre_made_diet_charts')->insert(
                [
                    [
                        'id' => 1,
                        'date_of_submission' => '28/10/2021',
                        'q_one' => 'yo',
                        'q_two' => 'lo',
                        'q_three' => 'mo',
                        'q_four' => 'po',
                        'pre_made_diet_chart_id' => '2',
                        'user_id' => 3,
                        'transaction_id' => 29,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
                        'created_at' => now(),
                        'updated_at' => now()
                    ],
                    [
                        'id' => 2,
                        'date_of_submission' => '28/10/2021',
                        'q_one' => 'yo',
                        'q_two' => 'lo',
                        'q_three' => 'mo',
                        'q_four' => 'po',
                        'pre_made_diet_chart_id' => '4',
                        'user_id' => 4,
                        'transaction_id' => 31,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'created_at' => now(),
                        'updated_at' => now()
    
                    ],
                    [
                        'id' => 3,
                        'date_of_submission' => '28/10/2021',
                        'q_one' => 'yo',
                        'q_two' => 'lo',
                        'q_three' => 'mo',
                        'q_four' => 'po',
                        'pre_made_diet_chart_id' => '5',
                        'user_id' => 5,
                        'transaction_id' => 41,
                        'date' => "শনিবার, রবিবার, সোমবার, মঙ্গলবার, বুধবার, বৃহস্পতি, শুক্রবার",
    
                        'created_at' => now(),
                        'updated_at' => now()
    
                    ]
                ]
            );
            DB::table('diet_requests')->insert(
                [
                    [
                        'id' => 1,
                        'transaction_id' => 51,
                        'q_one' => 'ko',
                        'q_two' => 'mo',
                        'q_three' => 'so',
                        'q_four' => 'pa',
                        'send' => 'y'
                    ],
                    [
                        'id' => 2,
                        'transaction_id' => 52,
                        'q_one' => 'ko',
                        'q_two' => 'mo',
                        'q_three' => 'so',
                        'q_four' => 'pa',
                        'send' => 'y'
                    ],
                    [
                        'id' => 3,
                        'transaction_id' => 53,
                        'q_one' => 'ko',
                        'q_two' => 'mo',
                        'q_three' => 'so',
                        'q_four' => 'pa',
                        'send' => 'y'
                    ],
                    [
                        'id' => 4,
                        'transaction_id' => 54,
                        'q_one' => 'ko',
                        'q_two' => 'mo',
                        'q_three' => 'so',
                        'q_four' => 'pa',
                        'send' => 'y'
                    ],
                    [
                        'id' => 5,
                        'transaction_id' => 55,
                        'q_one' => 'ko',
                        'q_two' => 'mo',
                        'q_three' => 'so',
                        'q_four' => 'pa',
                        'send' => 'y'
                    ],
    
                ]
            );
            DB::table('chats')->insert(
                [
    
                    ['id' => 1, 'sender_id' => 3, 'text_message' => 'hi, admin', 'receiver_id' => 1, 'uid' => 000,],
                    ['id' => 2, 'sender_id' => 3, 'text_message' => 'are u there ?', 'receiver_id' => 1, 'uid' => 000,],
                    ['id' => 3, 'sender_id' => 1, 'text_message' => 'yes, how can i help ?', 'receiver_id' => 3, 'uid' => 000,],
                    ['id' => 4, 'sender_id' => 3, 'text_message' => 'I want to lose weight.', 'receiver_id' => 1, 'uid' => 000,],
                    ['id' => 5, 'sender_id' => 1, 'text_message' => 'Okay, what kindda diet u want ?', 'receiver_id' => 3, 'uid' => 000,],
                    ['id' => 6, 'sender_id' => 3, 'text_message' => 'Extream keto', 'receiver_id' => 1, 'uid' => 000,],
                    ['id' => 7, 'sender_id' => 3, 'text_message' => 'is extream keto risky ?', 'receiver_id' => 1, 'uid' => 000,],
                    ['id' => 8, 'sender_id' => 1, 'text_message' => 'Yes, it is.I am gonna give u a normal keto.', 'receiver_id' => 3, 'uid' => 000,],
                    ['id' => 9, 'sender_id' => 3, 'text_message' => 'check your new diet on dashboard', 'receiver_id' => 1, 'uid' => 000,],
    
    
    
                    ['id' => 10, 'sender_id' => 4, 'text_message' => 'hey ?', 'receiver_id' => 1, 'uid' => 111,],
                    ['id' => 11, 'sender_id' => 4, 'text_message' => 'Can u help ?', 'receiver_id' => 1, 'uid' => 111,],
                    ['id' => 12, 'sender_id' => 1, 'text_message' => 'of course I can help.', 'receiver_id' => 4, 'uid' => 111,],
                    ['id' => 13, 'sender_id' => 1, 'text_message' => 'what kinda help u need ?', 'receiver_id' => 4, 'uid' => 111,],
                    ['id' => 14, 'sender_id' => 4, 'text_message' => 'i need a blance diet for my pregnant wife', 'receiver_id' => 1, 'uid' => 111,],
                    ['id' => 15, 'sender_id' => 1, 'text_message' => 'Okay, whats her age ?', 'receiver_id' => 4, 'uid' => 111,],
                    ['id' => 16, 'sender_id' => 4, 'text_message' => 'age is 25, height 5 foot', 'receiver_id' => 1, 'uid' => 111,],
                    ['id' => 17, 'sender_id' => 1, 'text_message' => 'here is ur diet chart', 'receiver_id' => 4, 'uid' => 111,],
                    ['id' => 18, 'sender_id' => 4, 'text_message' => 'thanks', 'receiver_id' => 1, 'uid' => 111,],
    
                ]
            );
    
            DB::table('blog_tags')->insert(
                [
                    [
                        'id' => 1,
                        'blog_id' => 1,
                        'tag_id' => 1
                    ],
                    [
                        'id' => 2,
                        'blog_id' => 1,
                        'tag_id' => 2
                    ],
                    [
                        'id' => 3,
                        'blog_id' => 1,
                        'tag_id' => 3
                    ],
                    [
                        'id' => 4,
                        'blog_id' => 1,
                        'tag_id' => 4
                    ],
                    [
                        'id' => 5,
                        'blog_id' => 1,
                        'tag_id' => 5
                    ],
                    [
                        'id' => 6,
                        'blog_id' => 2,
                        'tag_id' => 6
                    ],
                    [
                        'id' => 7,
                        'blog_id' => 2,
                        'tag_id' => 7
                    ],
                    [
                        'id' => 8,
                        'blog_id' => 2,
                        'tag_id' => 8
                    ],
                    [
                        'id' => 9,
                        'blog_id' => 2,
                        'tag_id' => 9
                    ],
                    [
                        'id' => 10,
                        'blog_id' => 2,
                        'tag_id' => 11
                    ],
                    [
                        'id' => 11,
                        'blog_id' => 2,
                        'tag_id' => 10
                    ],
                    [
                        'id' => 12,
                        'blog_id' => 3,
                        'tag_id' => 12
                    ],
                    [
                        'id' => 13,
                        'blog_id' => 3,
                        'tag_id' => 13
                    ],
                    [
                        'id' => 14,
                        'blog_id' => 3,
                        'tag_id' => 14
                    ],
                    [
                        'id' => 15,
                        'blog_id' => 3,
                        'tag_id' => 15
                    ],
                    [
                        'id' => 16,
                        'blog_id' => 3,
                        'tag_id' => 16
                    ],
                    [
                        'id' => 17,
                        'blog_id' => 4,
                        'tag_id' => 16
                    ],
                    [
                        'id' => 18,
                        'blog_id' => 4,
                        'tag_id' => 16
                    ],
                    [
                        'id' => 19,
                        'blog_id' => 4,
                        'tag_id' => 16
                    ],
                    [
                        'id' => 20,
                        'blog_id' => 4,
                        'tag_id' => 17
                    ],
                    [
                        'id' => 21,
                        'blog_id' => 4,
                        'tag_id' => 19
                    ],
                    [
                        'id' => 22,
                        'blog_id' => 5,
                        'tag_id' => 18
                    ],
                    [
                        'id' => 23,
                        'blog_id' => 5,
                        'tag_id' => 1
                    ],
                    [
                        'id' => 24,
                        'blog_id' => 5,
                        'tag_id' => 5
                    ],
                    [
                        'id' => 25,
                        'blog_id' => 5,
                        'tag_id' => 6
                    ],
                    [
                        'id' => 26,
                        'blog_id' => 5,
                        'tag_id' => 9
                    ],
                    [
                        'id' => 27,
                        'blog_id' => 6,
                        'tag_id' => 6
                    ],
                    [
                        'id' => 28,
                        'blog_id' => 6,
                        'tag_id' => 7
                    ],
                    [
                        'id' => 29,
                        'blog_id' => 6,
                        'tag_id' => 8
                    ],
                    [
                        'id' => 30,
                        'blog_id' => 6,
                        'tag_id' => 9
                    ],
                    [
                        'id' => 31,
                        'blog_id' => 6,
                        'tag_id' => 10
                    ],
                    [
                        'id' => 32,
                        'blog_id' => 7,
                        'tag_id' => 12
                    ],
                    [
                        'id' => 33,
                        'blog_id' => 7,
                        'tag_id' => 13
                    ],
                    [
                        'id' => 34,
                        'blog_id' => 7,
                        'tag_id' => 14
                    ],
                    [
                        'id' => 35,
                        'blog_id' => 7,
                        'tag_id' => 15
                    ],
                    [
                        'id' => 36,
                        'blog_id' => 7,
                        'tag_id' => 10
                    ],
                    [
                        'id' => 37,
                        'blog_id' => 8,
                        'tag_id' => 19
                    ],
                    [
                        'id' => 38,
                        'blog_id' => 8,
                        'tag_id' => 18
                    ],
                    [
                        'id' => 39,
                        'blog_id' => 8,
                        'tag_id' => 17
                    ],
                    [
                        'id' => 40,
                        'blog_id' => 8,
                        'tag_id' => 16
                    ],
                    [
                        'id' => 41,
                        'blog_id' => 8,
                        'tag_id' => 15
                    ],
                    [
                        'id' => 42,
                        'blog_id' => 9,
                        'tag_id' => 14
                    ],
                    [
                        'id' => 43,
                        'blog_id' => 9,
                        'tag_id' => 11
                    ],
                    [
                        'id' => 44,
                        'blog_id' => 9,
                        'tag_id' => 10
                    ],
                    [
                        'id' => 45,
                        'blog_id' => 9,
                        'tag_id' => 3
                    ],
                    [
                        'id' => 46,
                        'blog_id' => 9,
                        'tag_id' => 4
                    ],
                    [
                        'id' => 47,
                        'blog_id' => 10,
                        'tag_id' => 12
                    ],
                    [
                        'id' => 48,
                        'blog_id' => 10,
                        'tag_id' => 18
                    ],
                    [
                        'id' => 49,
                        'blog_id' => 10,
                        'tag_id' => 19
                    ],
                    [
                        'id' => 50,
                        'blog_id' => 10,
                        'tag_id' => 13
                    ],
                    [
                        'id' => 51,
                        'blog_id' => 10,
                        'tag_id' => 7
                    ]
                ]
            );
    
    
    
            DB::table('blog_categories')->insert(
                [
                    [
                        'id' => 1,
                        'blog_id' => 1,
                        'category_id' => 1
                    ],
                    [
                        'id' => 2,
                        'blog_id' => 2,
                        'category_id' => 2
                    ],
                    [
                        'id' => 3,
                        'blog_id' => 3,
                        'category_id' => 3
                    ],
                    [
                        'id' => 4,
                        'blog_id' => 4,
                        'category_id' => 4
                    ],
                    [
                        'id' => 5,
                        'blog_id' => 5,
                        'category_id' => 5
                    ],
                    [
                        'id' => 6,
                        'blog_id' => 6,
                        'category_id' => 5
                    ],
                    [
                        'id' => 7,
                        'blog_id' => 7,
                        'category_id' => 4
                    ],
                    [
                        'id' => 8,
                        'blog_id' => 8,
                        'category_id' => 3
                    ],
                    [
                        'id' => 9,
                        'blog_id' => 9,
                        'category_id' => 2
                    ],
                    [
                        'id' => 10,
                        'blog_id' => 10,
                        'category_id' => 1
                    ],
                    [
                        'id' => 11,
                        'blog_id' => 10,
                        'category_id' => 4
                    ],
                    [
                        'id' => 12,
                        'blog_id' => 6,
                        'category_id' => 2
                    ]
                ]
            );

        }
    
    }

}
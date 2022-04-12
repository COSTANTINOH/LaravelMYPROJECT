<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Report_types;
use App\Location;
use App\Branch;
use App\ULBD;
use App\Department;
use App\Address;
use App\Position;
use App\Phone;
use App\Photo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $role = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'staff',
            ],
            [
                'name' => 'hod',                
            ],
            [
                'name' => 'bm',                
            ],
            [
                'name' => 'hr',                
            ],
            [
                'name' => 'gm',                
            ],
            [
                'name' => 'ceo',                
            ],
        ];

        $position = [
            [
                'pname' => 'ict staff'
            ],
            [
                'pname' => 'finance staff'
            ],
            [
                'pname' => 'agriculture staff'
            ],
            [
                'pname' => 'ict HOD'
            ],
            [
                'pname' => 'finance HOD'
            ],
            [
                'pname' => 'agriculture HOD'
            ],
            [
                'pname' => 'default'
            ],
            [
                'pname' => 'branch manager'
            ],
            [
                'pname' => 'general manager'
            ],
            [
                'pname' => 'CEO'
            ],
            [
                'pname' => 'administrator'
            ],
        ];
        $address = [
            [
                'region' => 'Dar Es Salaam',            
                'district' => 'Ubungo',            
                'ward' => 'Kimara',
                'street' => 'Stop Over',                
            ],
            [
                'region' => 'Dodoma',            
                'district' => 'Kongwa',            
                'ward' => 'Ilolwe',
                'street' => 'Makole',                
            ],
            [
                'region' => 'Dar Es Salaam',            
                'district' => 'Temeke',            
                'ward' => 'Tandika',
                'street' => 'Mabondeni',                
            ],
        ];

        $location = [
            ['lname'=>'Dar Es Salaam'],
            ['lname'=>'Dodoma']
        ];
        $branch = [
            ['bname'=>'HQ','location_id'=>'1'],
            ['bname'=>'Temeke','location_id'=>'1'],
            ['bname'=>'Sabasaba','location_id'=>'1'],
            ['bname'=>'Dodoma Makole','location_id'=>'2']
        ];
        $department = [
            ['fullname'=>'Information And Communication Technology','short_form'=>'ICT'],
            ['fullname'=>'Finace','short_form'=>'Finance'],
            ['fullname'=>'JATU SACCOS','short_form'=>'Saccos'],
            ['fullname'=>'Transportation','short_form'=>'Transport'],
            ['fullname'=>'Marketing and public relation','short_form'=>'Marketing'],
            ['fullname'=>'Human Resource','short_form'=>'HR'],
            ['fullname'=>'default','short_form'=>'Default'],
            ['fullname'=>'leader','short_form'=>'Leader'],
        ];
        
        $uldb = [
            ['user_id'=>'1','location_id'=>'1','department_id'=>'1','branch_id'=>'1'],
            ['user_id'=>'2','location_id'=>'1','department_id'=>'7','branch_id'=>'1'],
            ['user_id'=>'3','location_id'=>'1','department_id'=>'7','branch_id'=>'1'],
            ['user_id'=>'4','location_id'=>'1','department_id'=>'1','branch_id'=>'1'],
            ['user_id'=>'5','location_id'=>'1','department_id'=>'2','branch_id'=>'1'],
            ['user_id'=>'6','location_id'=>'2','department_id'=>'3','branch_id'=>'1'],
            ['user_id'=>'7','location_id'=>'1','department_id'=>'1','branch_id'=>'1'],
            ['user_id'=>'8','location_id'=>'1','department_id'=>'2','branch_id'=>'1'],
            ['user_id'=>'9','location_id'=>'1','department_id'=>'3','branch_id'=>'1'],
            ['user_id'=>'11','location_id'=>'2','department_id'=>'1','branch_id'=>'4'],
            ['user_id'=>'12','location_id'=>'2','department_id'=>'2','branch_id'=>'4'],
            ['user_id'=>'13','location_id'=>'2','department_id'=>'3','branch_id'=>'4'],
            ['user_id'=>'14','location_id'=>'2','department_id'=>'3','branch_id'=>'4'],
            ['user_id'=>'10','location_id'=>'1','department_id'=>'6','branch_id'=>'1'],
            ['user_id'=>'15','location_id'=>'1','department_id'=>'8','branch_id'=>'1'],
            ['user_id'=>'16','location_id'=>'1','department_id'=>'8','branch_id'=>'1'],
        ];

        $report_type = [
            [
                'name' => 'staff'
            ],
            [
                'name' => 'hod',
            ],
            [
                'name' => 'branch_manager',                
            ],
            [
                'name' => 'hr',                
            ],
        ];

        $user = [
            [
                'first_name' => 'admin', // 1
                'middle_name' => 'admin',
                'last_name' => 'admin',
                'email'=>'admin@jrs.com',
                'role_id'=> '1',
                'address_id'=> '1',
                'photo_id'=>'1',
                'position_id'=> '11',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ], 
            [
                'first_name' => 'staff', // 2
                'middle_name' => 'staff',
                'last_name' => 'staff',
                'email'=>'staff@jrs.com',
                'role_id'=>'2',
                'address_id'=> '1',
                'photo_id'=>'1',
                'position_id'=> '7',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'hod', //3
                'middle_name' => 'hod',
                'last_name' => 'hod',
                'email'=>'hod@jrs.com',
                'role_id'=>'3',
                'address_id'=> '1',
                'photo_id'=>'1',
                'position_id' => '7',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],

            [
                'first_name' => 'hodict', //4
                'middle_name' => 'hodict',
                'last_name' => 'hodict',
                'email'=>'hod.ict@jrs.com',
                'role_id'=>'3',
                'address_id'=> '3',
                'photo_id'=>'1',
                'position_id' => '4',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'hodfinance', //5
                'middle_name' => 'hodfinance',
                'last_name' => 'hodfinance',
                'email'=>'hod.finance@jrs.com',
                'role_id'=>'3',
                'address_id'=> '1',
                'photo_id'=>'1',
                'position_id' => '5',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'hodagri', // 6
                'middle_name' => 'hodagri',
                'last_name' => 'hodagri',
                'email'=>'hod.agri@jrs.com',
                'role_id'=>'3',
                'address_id'=> '2',
                'photo_id'=>'1',
                'position_id' => '6',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],

            [
                'first_name' => 'staffict', //7
                'middle_name' => 'staffict',
                'last_name' => 'staffict',
                'email'=>'staff.ict@jrs.com',
                'role_id'=>'2',
                'address_id'=> '1',
                'photo_id'=>'1',
                'position_id'=> '1',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ], 
            [
                'first_name' => 'stafffinance', //8
                'middle_name' => 'stafffinance',
                'last_name' => 'stafffinance',
                'email'=>'staff.finance@jrs.com',
                'role_id'=>'2',
                'address_id'=> '3',
                'photo_id'=>'1',
                'position_id'=> '2',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'staffagri', //9
                'middle_name' => 'staffagri',
                'last_name' => 'staffagri',
                'email'=>'staff.agri@jrs.com',
                'role_id'=>'2',
                'photo_id'=>'1',
                'address_id'=> '3',
                'position_id'=> '3',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'hr', //10
                'middle_name' => 'hr',
                'last_name' => 'hr',
                'email'=>'hr@jrs.com',
                'role_id'=>'5',
                'photo_id'=>'1',
                'address_id'=> '1',
                'position_id'=> '7',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'bm',  //11
                'middle_name' => 'bm',
                'last_name' => 'bm',
                'email'=>'bm@jrs.com',
                'role_id'=>'4',
                'photo_id'=>'1',
                'address_id'=> '2',
                'position_id'=> '8',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'staffbranch', //12
                'middle_name' => 'staffbranch',
                'last_name' => 'staffbranch',
                'email'=>'staff.branch@jrs.com',
                'role_id'=>'2',
                'photo_id'=>'1',
                'address_id'=> '2',
                'position_id'=> '2',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'staffbranch2', //13
                'middle_name' => 'staffbranch2',
                'last_name' => 'staffbranch2',
                'email'=>'staff.branch2@jrs.com',
                'role_id'=>'2',
                'photo_id'=>'1',
                'address_id'=> '2',
                'position_id'=> '2',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'staffbranch3', //14
                'middle_name' => 'staffbranch3',
                'last_name' => 'staffbranch3',
                'email'=>'staff.branch3@jrs.com',
                'role_id'=>'2',
                'photo_id'=>'1',
                'address_id'=> '2',
                'position_id'=> '2',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'gm', //15
                'middle_name' => 'gm',
                'last_name' => 'gm',
                'email'=>'gm@jrs.com',
                'role_id'=>'6',
                'photo_id'=>'1',
                'address_id'=> '1',
                'position_id'=> '9',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
            [
                'first_name' => 'ceo', //16
                'middle_name' => 'ceo',
                'last_name' => 'ceo',
                'email'=>'ceo@jrs.com',
                'role_id'=>'7',
                'photo_id'=>'1',
                'address_id'=> '1',
                'position_id'=> '10',
                'password'=> bcrypt('12345678'),
                'active' => '1',
            ],
        ];

        $photo = [
            [
                'path' => 'one.png',
            ],
        ];

        $phone = [
            [
                'phone' => '0712032245',
                'user_id' => '1'
            ],
            [
                'phone' => '0712332245',
                'user_id' => '2'
            ],
            [
                'phone' => '0712332246',
                'user_id' => '3'
            ],
            [
                'phone' => '0712332247',
                'user_id' => '4'
            ],
            [
                'phone' => '0712332248',
                'user_id' => '5'
            ],
            [
                'phone' => '0712332249',
                'user_id' => '6'
            ],
            [
                'phone' => '0712332241',
                'user_id' => '7'
            ],
            [
                'phone' => '0712332242',
                'user_id' => '8'
            ],
            [
                'phone' => '0712332243',
                'user_id' => '9'
            ],
            [
                'phone' => '0712332256',
                'user_id' => '10'
            ],
            [
                'phone' => '0712332257',
                'user_id' => '11'
            ],
            [
                'phone' => '0712332233',
                'user_id' => '12'
            ],
            [
                'phone' => '0712332222',
                'user_id' => '13'
            ],
            [
                'phone' => '0712332255',
                'user_id' => '14'
            ],
            [
                'phone' => '0712331257',
                'user_id' => '15'
            ],
            [
                'phone' => '0712330257',
                'user_id' => '16'
            ],
        ];

        foreach ($photo as $key => $value) {
            Photo::create($value);
        }

        foreach ($position as $key => $value) {
            Position::create($value);
        }

        foreach ($address as $key => $value) {
            Address::create($value);
        }

        foreach ($report_type as $key => $value) {
            Report_types::create($value);
        }
  
        foreach ($role as $key => $value) {
            Role::create($value);
        }

        foreach ($user as $key => $value) {
            User::create($value);
        }

        foreach ($location as $key => $value) {
            Location::create($value);
        }
        foreach ($branch as $key => $value) {
            Branch::create($value);
        }
        foreach ($department as $key => $value) {
            Department::create($value);
        }
        foreach ($uldb as $key => $value) {
            ULBD::create($value);
        }
        foreach ($phone as $key => $value) {
            Phone::create($value);
        }
        
    }
}

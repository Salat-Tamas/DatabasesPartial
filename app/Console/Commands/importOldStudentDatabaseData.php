<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class importOldStudentDatabaseData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import-old-student-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports the old student database without primary key into the new corrected one';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $oldData = DB::connection('old_db')->table('Kepessegvizsga2021_2022')->get();

        foreach ($oldData as $student) {
            DB::table('exam_students')->insert([
                'name' => $student->name ?? 'N/A',
                'schoolCode' => $student->schoolCode ?? 'N/A',
                'schoolName' => $student->schoolName ?? 'N/A',
                'shortSchoolName' => $student->shortSchoolName ?? 'N/A',
                'schoolType' => $student->schoolType ?? 'N/A',
                'medium' => $student->medium ?? 'N/A',
                'location' => $student->location ?? 'N/A',
                'countyCode' => $student->countyCode ?? 'N/A',
                'county' => $student->county ?? 'N/A',
                'nationality' => $student->nationality ?? 'N/A',
                'romanian' => $student->romanian ?? -1,
                'mathematics' => $student->mathematics ?? -1,
                'native' => $student->native ?? 'N/A',
                'avg' => $student->avg ?? -1,
            ]);
        }

        $this->info('Data imported successfully from old student database!');
    }
}

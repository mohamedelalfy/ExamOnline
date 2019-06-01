<?php

namespace App\Imports;
use App\Question;
use App\Choose;
use Request;
use App\Exam;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class QuestionImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {


        $id = Request::segment(2);
        foreach ($rows as $row) 
        {
            if($row['type'] == 'TF')
            {
                 Question::create([
                    'type'              => $row['type'],
                    'question'          => $row['question'], 
                    'question_answer'   => $row['question_answer'], 
                    'degree'            => $row['degree'],
                    'exam_id'           =>$id,
                ]);
            }
            if($row['type'] == 'Ch')
            {   
                Question::create([
                    'type'              => $row['type'],
                    'question'          => $row['question'], 
                    'question_answer'   => $row['question_answer'], 
                    'degree'            => $row['degree'],
                    'exam_id'           =>$id,
                    ]);
                    $query  = DB::table('questions')->pluck('id')->last();
                Choose::create([
                    'ch_one'      => $row['ch_one'],
                    'ch_two'      => $row['ch_two'],
                    'ch_three'    => $row['ch_three'],
                    'ch_four'     => $row['ch_four'],
                    'question_id' => $query
                ]);
    
            }

        }
        

        
        // $query  = DB::table('questions')->pluck('id')->last();
        // return new Choose([
        //     'ch_one'    => $row[4],
        //     'ch_two'    => $row[5],
        //     'ch_three'  => $row[6],
        //     'ch_four'   => $row[7],
        //     'question_id'=>$query
        // ]);

    }
}

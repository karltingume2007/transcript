<?php

class enrolment extends MY_Model
{
    const DB_TABLE = 'enrollments';
    const DB_TABLE_PK = 'enrollment_id';
    
    public $enrollment_id;
    
    public $student_id;
    
    public $academic_year;
    
    public $program_id;
    
    public $level_id;
}


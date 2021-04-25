<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class studentController extends Controller
{
    public $students = array(array("B180910006","Jimmy","male","20","UB"),
                            array("B180910023","Alpha","male","20","Dnd"),
                            array("B180910033","Cody","male","20","Skh"));
    public function list_student()
    {
        $std=$this->students;
        $title="Listed student";
        return view("student",compact("title","std"));
    }
    public function get_student($id)
    {
        foreach($this->students as $student)
        {
            if($student[0] == $id)
            {
                return $student; 
            }
        }
    }
    public function search_student()
    {
        $title="search";
        return view("student_search",compact("title"));
    }
    public function search(Request $request)
    {
        $validated=$request->validate([
            'id'=>'required',
        ]);
        $result=array();
        foreach($this->students as $student)
        {
            if($student[0] == $request->id)
            {
                $result=$student;
            }
        }
        $title = "Search";
        return view("student_search",compact("title","result"));
    }
}
?>
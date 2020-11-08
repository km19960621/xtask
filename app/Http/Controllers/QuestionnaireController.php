<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questionnaire = Questionnaire::all();
        return view('questionnaire.index', ['questionnaire' => $questionnaire]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questionnaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, Questionnaire::$rules);

        $questionnaire = new Questionnaire;
        $form = $request->all();


        $questionnaire->fill($form);
        echo'<pre>';
        var_dump($questionnaire);
        echo'</pre>';
        $questionnaire->save();
        //var_dump($questionnaire);

        return redirect('/complete');
    }

    public function complete()
    {
      return view('questionnaire.complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $questionnaire = Questionnaire::find($request->id);
        if (empty($questionnaire)) {
          abort(404);
        }

        $age = $questionnaire->age;
        if ($age === 1) {
          $age_text = '20歳未満';
        } else if ($age === 2) {
          $age_text = '20歳〜39歳';
        } else if ($age === 3) {
          $age_text = '40歳〜59歳';
        } else if ($age === 4) {
          $age_text = '60歳以上';
        }

        $gender = $questionnaire->gender;
        if ($gender === 1) {
          $gender_text = '男性';
        } else if ($gender === 2) {
          $gender_text = '女性';
        }

        $desired_property_type = $questionnaire->desired_property_type;
        $desired_property_type_text = [];
        if (in_array('1', $desired_property_type)) {
          array_push($desired_property_type_text, '新築一戸建て');
        }
        if (in_array('2', $desired_property_type)) {
          array_push($desired_property_type_text, '中古一戸建て');
        }
        if (in_array('3', $desired_property_type)) {
          array_push($desired_property_type_text, 'マンション');
        }
        if (in_array('4', $desired_property_type)) {
          array_push($desired_property_type_text, '土地');
        }

        return view('questionnaire.show', ['questionnaire' => $questionnaire, 'age_text' => $age_text, 'gender_text' => $gender_text, 'desired_property_type_text' => $desired_property_type_text]);
    }
}

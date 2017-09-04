<?php

$kalimat = $_GET['kalimat'];

$command = 'python main-process/tes.py "'.$kalimat.'"';
exec($command, $out, $error);
if($error == 0)
{
    $result = json_decode($out[0]);
    echo '
    	<div class="divide"></div>
		<div class="title">
			<i class="ion-ios-arrow-right"></i> Sentiment Analysis Result
		</div>
    ';
    echo '<div class="debug">';
    echo '<div class="counted">';
    showCounted($result->arr_counted,$result->arr_score,$result->arr_word,$result->role_group);
    echo '</div>';
    echo '</div>';
    echo '
    	<div class="last-result">
			<strong>Sentiment :</strong> 
			<span>
		';
	$delimiter1 = ";";
    $counted   = explode($delimiter1, $result->arr_counted);
    $score     = explode($delimiter1, $result->arr_score);
    $i = 0;
    $totalScore = 0;
	foreach ($counted as $key => $value) {
		if($value == 'lxx' || $value == 's')
		{
			if($i > 0)
				echo ' &nbsp;+&nbsp; ';
			echo intval($score[$key]);
			$totalScore += $score[$key];
			$i++;
		}

	}
	echo ' &nbsp;=&nbsp; '.$totalScore;
	echo '</span>,';
	if($totalScore > 0)
		echo 'so the text is <span class="pos">pos</span>';
	else if($totalScore < 0)
		echo 'so the text is <span class="neg">neg</span>';
	else
		echo 'so the text is <span class="net">netral</span>';
	echo '</div>';
}
return "Error";

function showCounted($arr_counted,$arr_score,$arr_word,$role_group)
{
    // var_dump($arr_counted);
    // var_dump($arr_word);
    // var_dump($role_group);
    // echo "=================================";
    $W_NOUN       = 1;
    $W_VERB       = 2;
    $W_VERB_DI    = 3;
    $W_ADJ        = 4;
    $W_PREPOSISI  = 5;
    $W_KONJUNGSI  = 6;
    $W_INTERJEKSI = 7;
    $W_NUMERALIA  = 8;
    $W_KEYWORD    = 9;
    $W_ADV        = 10;
    $tyWord[$W_NOUN]        = 'Noun';
    $tyWord[$W_VERB]        = 'Verb';
    $tyWord[$W_VERB_DI]     = 'Verb_di';
    $tyWord[$W_ADJ]         = 'Adj';
    $tyWord[$W_PREPOSISI]   = 'Pre';
    $tyWord[$W_ADV]         = 'Adv';
    $tyWord[$W_KONJUNGSI]   = 'Konj';
    $tyWord[$W_INTERJEKSI]  = 'Intj';
    $tyWord[$W_NUMERALIA]   = 'Num';
    $tyWord[$W_KEYWORD]     = 'Keyw';
    $tyWord['unknown']     = 'unknown';

    $valWord[1] = "(+)";
    $valWord[-1] = "(-)";
    $valWord[0] = "(o)";

    $delimiter1 = ";";
    $delimiter2 = "|";
    $counted   = explode($delimiter1, $arr_counted);
    $score     = explode($delimiter1, $arr_score);
    $words     = explode($delimiter1, $arr_word);
    $roleGroup = json_decode($role_group);
    $totalWord = count($counted);

    
    $ret = "";
    $iForRoleGroup = 0;
    for($i=0; $i<$totalWord; $i++)
    {
        $roleword      = explode($delimiter2, $words[$i]);
        $the_word   = "";

        if($score[$i] == 1)       $style = 'positif';
        else if($score[$i] == -1) $style = 'negatif';
        else                      $style = 'netral';

        if($counted[$i] == 'lxx' or $counted[$i] == 'l')
        {
            if($counted[$i] == 'lxx')
            {
                $role = $roleGroup[$iForRoleGroup];
                $iForRoleGroup++;
                
                $the_word .= '<span class="r-wrap '.$style.'">';
                foreach ($role as $key => $value) 
                {
                    if($value !== null)
                    {
                        if($role[2]->type == 'unknown')
                            $action = '/create';
                        else
                            $action = '/update';

                        if($key == 2)
                            $the_word .= '<span class="r-lxx"><span>'.$role[2]->word
                                            .'<small>'.$tyWord[$role[2]->type].' '.$valWord[$role[2]->value].'</span></small>
                                        </span>';
                        else
                            $the_word .= '<span class=""><span>'.$value->word
                                            .'<small>'.$tyWord[$value->type].' '.$valWord[$value->value].'</span></small>
                                        </span>';
                    }
                }
                $the_word .= '</span>';

                if($role[3] !== null) $i++;
                if($role[4] !== null) $i++;
            }
        }
        else if($counted[$i] == 'lnn')
        {   
            $the_word .= '<span class="r-wrap-ln '.$style.'">';
            $the_word .= '<span class="">'.$roleword[0].'</span>';

            if($counted[$i+1] == 'ln')
            {
                $i++;
                $roleword = explode($delimiter2, $words[$i]);
                $the_word .= '<span class="">'.$roleword[0].'</span>';
            }
            if($i+1 < $totalWord && $counted[$i+1] == 'ln')
            {
                $i++;
                $roleword = explode($delimiter2, $words[$i]);
                $the_word .= '<span class="">'.$roleword[0].'</span>';
            }
            $the_word .= '</span>';
        }
        else
        {
            if($roleword[1] == 'unknown')
                $action = '/create';
            else
                $action = '/update';

            if($counted[$i] == 's')
                $iForRoleGroup++;
            if(count($roleword) > 1)
                $the_word .= '<span class="r-alone '.$style.'"><span>'.$roleword[0]
                                .'<small>'.$tyWord[$roleword[1]].' '.$valWord[intval($roleword[2])].'</small></span>
                            </span>';
        }

        $ret .= $the_word;
    }

    echo $ret;
}

?>
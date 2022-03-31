@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/apps/scrumboard.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/components/custom-countdown.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/forms/theme-checkbox-radio.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/users/account-setting.css") }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/components/custom-modal.css") }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/components/custom-sweetalert.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/plugins/sweetalerts/sweetalert2.min.css") }}">
    <style>
        .blockui-growl-message {
            background-color: transparent;
        }
    </style>
@endsection

@extends('candidate.layouts.app')

@section('content')

{{--    @include('candidate.pages.assessment._partials.submit')--}}
    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Assessment / {{ $assessment->title }}
            </p>
        </div>
        @include('layouts.notice')
       @include('candidate.pages.assessment._partials.starter')
        {{--<div class="mt-5 row test-frame ">--}}
            {{--@include('candidate.pages.assessment._partials.timer_frame')--}}
        {{--</div>--}}

        <div class="blockui-growl-message">
            <i class="flaticon-double-check"></i><span class="msg_info"></span>
        </div>

    </div>



@endsection

@section('custom_js')

    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/countdown/jquery.countdown.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/blockui/jquery.blockUI.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/components/custom-countdown.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/sweetalerts/sweetalert2.min.js") }}"></script>

    <script>
        let engagedID = null;
        let current = 0;

        let current_qst = $('.current_index');

        $(document).ready(function(){
//            addTimer();
        });

        //set up ajax

        function buildQuestion(question, key, length, answers) {
            return `<div class="col-12 show_${key}" style="display: ${key===0?'block':'none'};">
                        <input type="hidden" name="key" value="${engagedID}" >
                        <div class="row">
                            <div class="connect-sorting-content col-12" data-sortable="true">
                                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                                    <div class="card-body ">
                                        <p class="font-weight-bold text-thick ">${question.question}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                                    <div class="card-body ">
                                        <div class="row ${question.uuid}_answers">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="connect-sorting-content col-12" data-sortable="true">
                                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                                    <div class="card-body ">
                                        <a href="#" class="btn btn-dark btn_prev" onclick="event.preventDefault(); prevQuestion(${key}, ${length}, '${question.uuid}')" style="display: none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                            Previous
                                        </a>

                                        <a href="#" class="btn btn-primary btn_next float-right" onclick="event.preventDefault(); nextQuestion(${key}, ${length}, '${question.uuid}')" style="">
                                            Next
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                        </a>

                                        <button type="submit" onclick="event.preventDefault(); alertSubmit()" class="btn btn-info float-right btn_submit" style="display: none;" data-toggle="modal" data-target="#submitModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            Submit
                                        </button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
        }

        function buildAnswer(question, answer) {
//            console.log('answers are built');
            return `<div class="col-md-6 col-sm-12">
                      <div class="n-chk">
                        <label class="new-control new-radio radio-primary">
                        <input type="radio" name="${question.uuid}" value="${answer.uuid}" class="new-control-input ${question.uuid}_value">
                        <span class="new-control-indicator"></span>
                        <span class="text-thick  font-weight-bold">${answer.answer}</span>
                      </label>
                      </div>
                   </div>`;
        }

        function start(key, id) {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                type:'POST',
                url:"{{ route('begin.assessment') }}",
                data:{
                    id: id,
                    key: key
                }
            }).done(function(data){
                console.log(data);
                if(data['success']){
                    engagedID = data['engagedID'];

                    removeInstructions();
                    addTimer();
                    prepareQuestions(data['data']);
                    startTimer(data['end_time']);


                    $('.msg_info').text(data['message']);
                    flashNotice('#1B55E2', 3000)
                    minutePulse();

                }else{
                    $('.msg_info').text(data['message']);
                    flashNotice('#c6080c', 3000)
                }

            }).fail(function(data){
//                console.log(data)
                $('.msg_info').text(data['message']);
                flashNotice('#c6080c', 3000)
            });

        }

        function removeInstructions() {
            $('.instruction').remove();
            $('.test-frame').removeClass('d-flex justify-content-center');
        }

        function flashNotice(bg, sec) {
            $.blockUI({
                message: $('.blockui-growl-message'),
                fadeIn: 700,
                fadeOut: 700,
                timeout: sec, //unblock after 3 seconds
                showOverlay: false,
                centerY: false,
                css: {
                    width: '250px',
                    backgroundColor: bg,
                    top: '80px',
                    left: 'auto',
                    right: '15px',
                    border: 0,
                    opacity: .95,
                    zIndex: 1200,
                }
            });
        }
        
        function addTimer() {
            let _timer_frame = `@include('candidate.pages.assessment._partials.timer_frame')`;
            $('.test-frame').append(_timer_frame)
        }

        function prepareQuestions(questions) {
            let length = questions.length;
            $('.question_position').text(1);
            $('.question_total').text(length);



            $.each(questions, (key, question)=>{
                let answers = question.answers;
                $('.questions_frames_parent').append(buildQuestion(question, key, length, answers));

                $.each(answers, (pos,answer)=>{
                    $(`.${question.uuid}_answers`).append(buildAnswer(question, answer));
                });
            });
        }
        
        function startTimer(mins) {

            let Main_minutes = mins;

            if(mins!==null){

                mins = 60*mins;

                //update end time to unix timestamp

                let unixNow = Math.round(new Date().getTime()/1000);

                let interval_fn = setInterval(function () {


                    let unixEnd = unixNow + (mins-=1);

                    let delta = Math.abs(unixEnd - unixNow);

                    //hours
                    let hours = Math.floor(delta / 3600) % 24;
                    delta -= hours * 3600;

                    //minutes
                    let minutes = Math.floor(delta / 60) % 60;
                    delta -= minutes * 60;

                    //seconds
                    let seconds = delta % 60;

                    if(mins<= 0){
                        clearInterval(interval_fn);
                        $('.msg_info').text("Time is Up");
                        submitAssessment()
                        //submit form
                    }else{
//                        console.log(hours, minutes, seconds)
                        updateTimer(hours, minutes, seconds)
                    }

                }, 1000);

            }else{
                $('#cd-circle').children().remove();
                $('#cd-circle').append("<h1 style='text-align: center'>Not Timed</h1>")
            }

        }

        function prevQuestion(num, total, qst_id) {
            if(current>0){
                let cur_elem = $('.show_'+num);
                let prev_elem = $('.show_'+(parseInt(num)-1));
                cur_elem.hide();
                prev_elem.show();
                current -= 1;

                let radioValue = $(`input[name=${qst_id}]:checked`).val();
                updateQuestion(engagedID, qst_id, radioValue);

                if(current===0){
                    $('.btn_prev').hide();
                    current_qst.text(1)
                }else{
                    current_qst.text(current+1)
                }



                if(current < (parseInt(total)-1)){
                    $('.btn_next').show();
                    $('.btn_submit').hide();
                }
            }
            $('.question_position').text(current+1);
//            console.log("viewing question "+ (current+1));
        }

        function nextQuestion(num, total, qst_id) {
            let cur_elem = $('.show_'+num);
            let next_elem = $('.show_'+(parseInt(num)+1));
            cur_elem.hide();
            next_elem.show();


            let radioValue = $(`input[name=${qst_id}]:checked`).val();
            updateQuestion(engagedID, qst_id, radioValue);


            $('.btn_prev').show();
            current += 1;

            current_qst.text(current+1);

            if(current >= (parseInt(total)-1)){
                $('.btn_next').hide();
                $('.btn_submit').show();
            }

            $('.question_position').text(current+1);
//            console.log("viewing question "+ (current+1));
        }

        function updateTimer(h, m, s){

            let hrs  = $('.hrs_val').text(formatIt(h));
            let mins = $('.min_val').text(formatIt(m));
            let secs = $('.sec_val').text(formatIt(s));

        }

        function formatIt(val) {
            if(val <10){
                return "0"+val;
            }else{
                return val;
            }
        }

        function updateQuestion(assessment_id, question_id, answer_id){
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                type:'POST',
                url:"{{ route('update.ongoing.engaged.assessment') }}",
                data:{
                    key: assessment_id,
                    question_id : question_id,
                    answer_id : answer_id
                }
            }).done(function(data){
                console.log(data);
            }).fail(function(data){
                console.log(data)
            });
        }

        function alertSubmit(){
            swal({
                title: '<h3>Submit!</h3>',
                type: 'info',
                html: "<p>Are you submitting now?</p>",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Submit!',
                cancelButtonText: 'Ignore',
                padding: '2em'
            }).then((value)=>{
                console.log(value);
                if(value.dismiss==='cancel'){
                    swal("Continue Assessment!");
                }

                if(value.value){
                    submitAssessment();
                }

            });
        }

        function submitAssessment(){
            swal("Submitting!", "Submitting your assessment!", "success");
            console.log('submitting assessment');
            $('form#assessment_form').submit();
        }

        function minutePulse() {
            setInterval(function () {
                pulse();
            }, 5000)
        }

        function pulse() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                type:'POST',
                url:"{{ route('update.ongoing.engaged.assessment') }}",
                data:{
                    key: engagedID,
                }
            }).done(function(data){
                console.log(data);
            }).fail(function(data){
                console.log(data)
            });
        }

    </script>

    {{--Prevent page reload--}}
    <script type="text/javascript">
//        window.onbeforeunload = function() {return "Are you sure you want to leave? your progress may be lost!";}
    </script>
    {{--disable inspection , enable in live version--}}
    <script type="text/javascript">
//        $(document).bind("contextmenu",function(e) {
//            e.preventDefault();
//        });
//        $(document).keydown(function(e){
//            if(e.which === 123){
//                return false;
//            }
//        });
//        eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(3(){(3 a(){8{(3 b(2){7((\'\'+(2/2)).6!==1||2%5===0){(3(){}).9(\'4\')()}c{4}b(++2)})(0)}d(e){g(a,f)}})()})();',17,17,'||i|function|debugger|20|length|if|try|constructor|||else|catch||5000|setTimeout'.split('|'),0,{}))
    </script>

@endsection

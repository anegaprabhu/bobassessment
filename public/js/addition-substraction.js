
;var BOBASSESSMENT = {};

;(function($) {

    BOBASSESSMENT.general = {
        randomIntFromInterval: function (min, max) { // min and max included
            return Math.floor(Math.random() * (max - min + 1) + min);
        },
        randomNumberWithDecimal: function (min, max, decimalPlaces) {  
            //(BOBASSESSMENT.general.randomNumberWithDecimal(0,9,2) * 1).toString().replace(/^0+/, '')
            var rand = Math.random() < 0.5 ? ((1-Math.random()) * (max-min) + min) : (Math.random() * (max-min) + min);  // could be min or max or anything in between
            var power = Math.pow(10, decimalPlaces);
            return Math.floor(rand*power) / power;
        },
        generateSum: function (arr,vk) {
            sumString = "<table style=' font-size: 20px; font-weight: bold;'>";
            for(y=0;y<(arr['sum_items']).length;y++){
                var number_count = (arr['sum_items'][y]).toString().length // which includes '-' symbol
                sumString += "<tr><td class='text-right sum_item pr-3'>" + arr['sum_items'][y] + "</td></tr>";                         
            }
                sumString += "<tr><td style=' border-top: 2px solid black;'>";
                if(vk == 'yes'){
                    sumString += "<input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' />"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' />";
                }
                sumString += "</td></tr>";
            sumString += "</table>";
            return sumString;
        },
        addZerointoDecimal: function(num) {
            // Convert input string to a number and store as a variable.
                var value = Number(num);      
            // Split the input string into two arrays containing integers/decimals
                var res = (num).toString().split(".");     
            // If there is no decimal point or only one decimal place found.
                if(res.length == 1 || res[1].length < 3) { 
            // Set the number to two decimal places
                    value = value.toFixed(2);
                }
            // Return updated or original number.
            return value;
            },
        generateMultiplicationsum: function(arr,vk){
            // console.log(arr);
            sumString = "<table style=' font-size: 30px; font-weight: bold; margin-top: 20px;'>";
            for(y=0;y<(arr['multiplicand']).length;y++){
                sumString += "<tr>";
                sumString += "<td style=' padding-right: 5px;'>" + arr['multiplicand'][y] + "</td>";
                sumString += "<td>&times;</td>";
                sumString += "<td style=' padding-right: 5px;'>" + arr['multiplier'][y] + "</td>";
                if(vk == 'yes'){
                    sumString += "<td style='padding: 0px 5px;'><input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td>"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<td style='padding: 0px 5px;'><input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td>";
                }
                sumString += "</tr>";
            }
            sumString += "</table>";
            return sumString;
        },
        generateDivisionsum: function(arr,vk){
            // console.log(arr);
            sumString = "<table style=' font-size: 30px; font-weight: bold; margin-top: 20px;'>";
            for(y=0;y<(arr['dividend']).length;y++){
                sumString += "<tr>";
                sumString += "<td style=' padding-right: 5px;'>" + arr['dividend'][y] + "</td>";
                sumString += "<td>&#xF7;</td>";
                sumString += "<td style=' padding-right: 5px;'>" + arr['divisor'][y] + "</td><tr>";
                if(vk == 'yes'){
                    sumString += "<tr><td style='padding: 0px 5px;'><input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td>"; // placeholder='"+arr['answer']+"'
                    sumString += "<td style='padding: 0px 5px;'><input id='answer_input_remainder' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td></tr>"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<tr><td style='padding: 0px 5px;'><input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td>";
                    sumString += "<td style='padding: 0px 5px;'><input id='answer_input_remainder' type='text' class='text-right pr-1' style='width:100px; border: 0px solid black;' value='' /></td></tr>";
                }
                sumString += "</tr>";
            }
            sumString += "</table>";
            return sumString;
        },
        negativeIndex: function(rows,negCount)
        {
            var random_negative_index = [];
            for(d=0;d<negCount;d++){
                var ni = BOBASSESSMENT.general.randomIntFromInterval(1, rows);
                random_negative_index.push(ni);
            }
            return random_negative_index;
        },
        tripleDigitSingleDigitWithoutRemainder: function(rem){
              var small = Math.floor(Math.random() * 8) + 2;
              var limit = Math.ceil(850 / small)
              var minimum = Math.floor(100 / small)
              var big = Math.ceil(Math.random() * limit) + minimum
              var result_val = (big * small) + "_" + small + "_" + big % small;
              return result_val;
        },
        fourDigitSingleDigitWithoutRemainder: function(rem){
              var small = Math.floor(Math.random() * 8) + 2;
              var limit = Math.ceil(8500 / small)
              var minimum = Math.floor(1001 / small)
              var big = Math.ceil(Math.random() * limit) + minimum
              var result_val = (big * small) + "_" + small + "_" + big % small;
              return result_val;
        },
        doubleDigitDoubleDigitWithoutRemainder: function(rem){
            var divisor = BOBASSESSMENT.general.randomIntFromInterval(10, 45);
            if(divisor < 20){
                var dividend = divisor * 4;
            }else if(divisor < 30 && divisor >= 20){
                var dividend = divisor * 3;
            }else if(divisor <= 45 && divisor >= 30){
                var dividend = divisor * 2;
            }

            var result_val = dividend + "_" + divisor + "_" + dividend % divisor;
              return result_val;
        },
        tripleDigitDoubleDigitWithoutRemainder: function(rem){
            var divisor = BOBASSESSMENT.general.randomIntFromInterval(10, 99);
            if(divisor < 20){
                var dividend = divisor * 4;
            }else if(divisor < 30 && divisor >= 10){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 33);
                var dividend = divisor * multiplier;
            }else if(divisor < 50 && divisor >= 30){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 19);
                var dividend = divisor * multiplier;
            }else if(divisor < 60 && divisor >= 50){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 16);
                var dividend = divisor * multiplier;
            }else if(divisor < 70 && divisor >= 60){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 14);
                var dividend = divisor * multiplier;
            }else if(divisor < 85 && divisor >= 70){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 11);
                var dividend = divisor * multiplier;
            }else if(divisor <= 99 && divisor >= 85){
                var multiplier = BOBASSESSMENT.general.randomIntFromInterval(1, 9);
                var dividend = divisor * multiplier;
            }

            var result_val = dividend + "_" + divisor + "_" + dividend % divisor;
              return result_val;
        },
        tripleDigitSingleDigitWithoutRemainder_old: function(rem)
        {
            console.log(random_negative_index);
            var dividend = BOBASSESSMENT.general.randomIntFromInterval(100, 999);
            var divisor = BOBASSESSMENT.general.randomIntFromInterval(2, 9);
            var remainder = dividend % divisor;
            console.log("out: " + dividend + "_" + divisor);
            console.log("remainder: " + (dividend % divisor));
            var result_val = "";

            // result_val  = dividend % divisor;

            if(rem == 'yes'){
                result_val = dividend + "_" + divisor + "_" + remainder;
            }else{
                if(dividend % divisor != 0)
                {
                    console.log('loop_again');
                    result_val = BOBASSESSMENT.general.tripleDigitSingleDigitWithoutRemainder();
                }else{
                    result_val = dividend + "_" + divisor + "_" + remainder;
                    console.log("return: " + result_val);
                }
            }
            console.log("final_return: " + result_val);
            return result_val;

        }
    }

    BOBASSESSMENT.mod1 = {
        directAddition: function(rows) //Direct addition / partners
        {
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            for(ga=0;ga<rows;ga++){

                if(sumup_loop >= 6){
                    var n = Math.floor(Math.random() * 3) -3 //randomIntFromInterval(1, 9)
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    if(ga !=0){
                        var n = BOBASSESSMENT.general.randomIntFromInterval(1,(9-sumup_loop));
                        sumup_loop += n;
                        addend.push(n);
                        ansArr.push(sumup_loop);
                    }else{
                        var n = BOBASSESSMENT.general.randomIntFromInterval(1,9);
                        sumup_loop += n;
                        addend.push(n);
                        ansArr.push(sumup_loop);
                    }
                }

            }
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];
        }
    };

    BOBASSESSMENT.mod2 = {
        singleDigit: function(rows,negCount) // Direct / Partner / Friends / Family
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);
            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                var negative_number = Math.floor(Math.random() * 9) - 9 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            tmpCnt = 1;
                        }        
                    }
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    var unit_rod = parseInt(sumup_loop % 10);
                    var new_n = 0;
                    if(unit_rod == 0){
                        var new_n = BOBASSESSMENT.general.randomIntFromInterval(1, 9);
                    }else{
                        var new_n = Math.floor(Math.random() * unit_rod) - unit_rod;
                    }
                    sumup_loop += new_n;
                    addend.push(new_n);
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        }
    };

    BOBASSESSMENT.mod3 = {
        singleDigit: function(rows,negCount) // Module 3 Double Digit on top
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);
            for(c=0;c<rows;c++){

                if(c == 0){
                    var n = BOBASSESSMENT.general.randomIntFromInterval(11, 70);
                }else{
                    var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                }
                var negative_number = Math.floor(Math.random() * 9) - 9 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            tmpCnt = 1;
                        }        
                    }
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    var unit_rod = parseInt(sumup_loop % 10);
                    var new_n = 0;
                    if(unit_rod == 0){
                        var new_n = BOBASSESSMENT.general.randomIntFromInterval(1, 9);
                    }else{
                        var new_n = Math.floor(Math.random() * unit_rod) - unit_rod;
                    }
                    sumup_loop += new_n;
                    addend.push(new_n);
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        }
    };

    BOBASSESSMENT.level2 = {
        singleDigitTwoDDonTop: function(rows,negCount) // Module 3 Double Digit on top
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);
            for(c=0;c<rows;c++){

                if(c == 0){
                    var n = BOBASSESSMENT.general.randomIntFromInterval(15, 60);
                }else if(c == 1){

                    var tmpCnt = 0;
                    for(e=0;e<random_negative_index.length;e++){
                        if(c==random_negative_index[e]){
                                tmpCnt = 1;
                        }
                    }
                    if(tmpCnt == 1){
                        var n = Math.floor(Math.random() * (sumup_loop - 10)) - sumup_loop;
                    }else{
                        var n = BOBASSESSMENT.general.randomIntFromInterval(11, (72 - sumup_loop));
                    }

                }
                else{
                    var tmpCnt = 0;
                    for(e=0;e<random_negative_index.length;e++){
                        if(c==random_negative_index[e]){
                                tmpCnt = 1;
                        }
                    }
                    if(tmpCnt == 1){
                        if(sumup_loop >= 9)
                        {
                            var n = Math.floor(Math.random() * 9) - 9 //randomIntFromInterval(1, 9)
                        }else if(sumup_loop < 2){
                            var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                        }else{
                            var n = Math.floor(Math.random() * sumup_loop) - sumup_loop //randomIntFromInterval(1, 9)
                        }
                    }else{
                        var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                    }
                }

                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                // debugger;
            }
            
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        }
    };    

	BOBASSESSMENT.additionAndSubstration = {

        negativeIndex: function(rows,negCount)
        {
            var random_negative_index = [];
            for(d=0;d<negCount;d++){
                var ni = BOBASSESSMENT.general.randomIntFromInterval(1, rows);
                random_negative_index.push(ni);
            }
            return random_negative_index;
        }, //end of negativeIndex
		singleDigit: function(rows,negCount)
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = this.negativeIndex(rows,negCount);
            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                var negative_number = Math.floor(Math.random() * 9) -9 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            tmpCnt = 1;
                        }        
                    }
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(negative_number);
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        }, //end of singleDigit
        doubleDigit: function(rows,negCount)
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = this.negativeIndex(rows,negCount);

            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomIntFromInterval(11, 99)
                var negative_number = Math.floor(Math.random() * 89) -99 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            // sumup_loop += negative_number;
                            // addend.push(negative_number);
                            tmpCnt = 1;
                            // break;
                        }        
                    }
                    // console.log(e);
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(negative_number);
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        }, //end of doubleDigit
        singleDoubleDigit: function(rows,negCount) {



            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = this.negativeIndex(rows,negCount);
            var dd_count = Math.round((rows /100) * 70);
            var sd_count = rows - dd_count;

            var arr = [];
                while(arr.length < sd_count){
                var r = Math.floor(Math.random() * 8) + 2;
                if(arr.indexOf(r) === -1) arr.push(r);
                }
            // console.log('unique: ' + set_number + ': ' + arr);


            for(c=0;c<rows;c++){

                var tmpCnt0 = 0;
                for(y=0;y<arr.length;y++){
                    if(c==arr[y]){
                        tmpCnt0 = 1;
                    }
                }
                if(tmpCnt0 == 0){ //DD in SD/DD

                    var n = BOBASSESSMENT.general.randomIntFromInterval(11, 99)
                var negative_number = Math.floor(Math.random() * 89) -99 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            // sumup_loop += negative_number;
                            // addend.push(negative_number);
                            tmpCnt = 1;
                            // break;
                        }        
                    }
                    // console.log(e);
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(negative_number);
                    ansArr.push(sumup_loop);
                }


                }else{ //SD in SD/DD

                    var n = BOBASSESSMENT.general.randomIntFromInterval(1, 9)
                var negative_number = Math.floor(Math.random() * 9) -9 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            // sumup_loop += negative_number;
                            // addend.push(negative_number);
                            tmpCnt = 1;
                            // break;
                        }        
                    }
                    // console.log(e);
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(negative_number);
                    ansArr.push(sumup_loop);
                }


                }

            }

            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];




        }, //end of singleDoubleDigit
        tripleDigit: function(rows,negCount)
		{
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = this.negativeIndex(rows,negCount);

            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomIntFromInterval(100, 999)
                var negative_number = Math.floor(Math.random() * 110) -999 //randomIntFromInterval(1, 9)

                var tmpCnt = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c==random_negative_index[e]){
                        if(sumup_loop + negative_number > 0){
                            // sumup_loop += negative_number;
                            // addend.push(negative_number);
                            tmpCnt = 1;
                            // break;
                        }        
                    }
                    // console.log(e);
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(n);
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(negative_number);
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];

        },
    }
    
    BOBASSESSMENT.multiplication = {

        doubleDigitSingleDigit: function()
        {
            var multiplicand = BOBASSESSMENT.general.randomIntFromInterval(11, 99);
            var multiplier   = BOBASSESSMENT.general.randomIntFromInterval(1, 9);
            var multiplicand_arr = [];
            var multiplier_arr   = [];
            var sumup_loop = 0;
            multiplicand_arr.push(multiplicand);
            multiplier_arr.push(multiplier);
            sumup_loop = multiplicand * multiplier;

            return [{'multiplicand' : multiplicand_arr, 'multiplier' : multiplier_arr, 'answer' : sumup_loop}]
           
        },
        tripleDigitSingleDigit: function()
        {
            var multiplicand = BOBASSESSMENT.general.randomIntFromInterval(100, 999);
            var multiplier   = BOBASSESSMENT.general.randomIntFromInterval(1, 9);
            var multiplicand_arr = [];
            var multiplier_arr   = [];
            var sumup_loop = 0;
            multiplicand_arr.push(multiplicand);
            multiplier_arr.push(multiplier);
            sumup_loop = multiplicand * multiplier;

            return [{'multiplicand' : multiplicand_arr, 'multiplier' : multiplier_arr, 'answer' : sumup_loop}]
           
        },
        doubleDigitDoubleDigit: function()
        {
            var multiplicand = BOBASSESSMENT.general.randomIntFromInterval(11, 99);
            var multiplier   = BOBASSESSMENT.general.randomIntFromInterval(11, 99);
            var multiplicand_arr = [];
            var multiplier_arr   = [];
            var sumup_loop = 0;
            multiplicand_arr.push(multiplicand);
            multiplier_arr.push(multiplier);
            sumup_loop = multiplicand * multiplier;

            return [{'multiplicand' : multiplicand_arr, 'multiplier' : multiplier_arr, 'answer' : sumup_loop}]
           
        },
        tripleDigitDoubleDigit: function()
        {
            var multiplicand = BOBASSESSMENT.general.randomIntFromInterval(100, 999);
            var multiplier   = BOBASSESSMENT.general.randomIntFromInterval(11, 99);
            var multiplicand_arr = [];
            var multiplier_arr   = [];
            var sumup_loop = 0;
            multiplicand_arr.push(multiplicand);
            multiplier_arr.push(multiplier);
            sumup_loop = multiplicand * multiplier;

            return [{'multiplicand' : multiplicand_arr, 'multiplier' : multiplier_arr, 'answer' : sumup_loop}]
           
        }
    }  
    BOBASSESSMENT.division = {
        tripleDigitsSingleDigit: function(rem)
        {

            var dividend_arr = [];
            var divisor_arr = [];
            var sumup_loop = 0;

            var returnValue = BOBASSESSMENT.general.tripleDigitSingleDigitWithoutRemainder(rem);
                console.log('returned_value: ' + returnValue);
                returnValue = returnValue.split('_');
                dividend_arr.push(returnValue[0]);
                divisor_arr.push(returnValue[1]);
                sumup_loop = returnValue[0] / returnValue[1];
                // alert([{'devidend' : multiplicand_arr, 'divisor' : multiplier_arr, 'answer' : sumup_loop}]);
                // return;
                return [{'devidend' : dividend_arr, 'divisor' : divisor_arr, 'answer' : sumup_loop, 'remainder' : returnValue[2]}];
            },
            fourDigitsSingleDigit: function(rem)
            {
    
                var dividend_arr = [];
                var divisor_arr = [];
                var sumup_loop = 0;
    
                var returnValue = BOBASSESSMENT.general.fourDigitSingleDigitWithoutRemainder(rem);
                    console.log('returned_value: ' + returnValue);
                    returnValue = returnValue.split('_');
                    dividend_arr.push(returnValue[0]);
                    divisor_arr.push(returnValue[1]);
                    sumup_loop = returnValue[0] / returnValue[1];
                    // alert([{'devidend' : multiplicand_arr, 'divisor' : multiplier_arr, 'answer' : sumup_loop}]);
                    // return;
                    return [{'devidend' : dividend_arr, 'divisor' : divisor_arr, 'answer' : sumup_loop, 'remainder' : returnValue[2]}];
            },
            doubleDigitDoubleDigit: function(rem)
            {
    
                var dividend_arr = [];
                var divisor_arr = [];
                var sumup_loop = 0;
    
                var returnValue = BOBASSESSMENT.general.doubleDigitDoubleDigitWithoutRemainder(rem);
                    console.log('returned_value: ' + returnValue);
                    returnValue = returnValue.split('_');
                    dividend_arr.push(returnValue[0]);
                    divisor_arr.push(returnValue[1]);
                    sumup_loop = returnValue[0] / returnValue[1];
                    // alert([{'devidend' : multiplicand_arr, 'divisor' : multiplier_arr, 'answer' : sumup_loop}]);
                    // return;
                    return [{'devidend' : dividend_arr, 'divisor' : divisor_arr, 'answer' : sumup_loop, 'remainder' : returnValue[2]}];
            },
            tripleDigitDoubleDigit: function(rem)
            {
    
                var dividend_arr = [];
                var divisor_arr = [];
                var sumup_loop = 0;
    
                var returnValue = BOBASSESSMENT.general.tripleDigitDoubleDigitWithoutRemainder(rem);
                    console.log('returned_value: ' + returnValue);
                    returnValue = returnValue.split('_');
                    dividend_arr.push(returnValue[0]);
                    divisor_arr.push(returnValue[1]);
                    sumup_loop = returnValue[0] / returnValue[1];
                    // alert([{'devidend' : multiplicand_arr, 'divisor' : multiplier_arr, 'answer' : sumup_loop}]);
                    // return;
                    return [{'devidend' : dividend_arr, 'divisor' : divisor_arr, 'answer' : sumup_loop, 'remainder' : returnValue[2]}];
            }
    
    }
    BOBASSESSMENT.decimal = {
        singleDigitDecimal: function(rows,negCount) 
        {
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);
            var zero_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);

            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomNumberWithDecimal(1, 9, 2);
                    // n = BOBASSESSMENT.general.addZerointoDecimal(n);
                var negative_number = BOBASSESSMENT.general.randomNumberWithDecimal(-9, -1, 2); //Math.floor(Math.random() * 9) -9 //randomIntFromInterval(1, 9)
                    // negative_number = BOBASSESSMENT.general.addZerointoDecimal(negative_number);
                var zero_number = BOBASSESSMENT.general.randomNumberWithDecimal(0, 1, 2);
                    // zero_number = BOBASSESSMENT.general.addZerointoDecimal(zero_number);
                var tmpCnt = 0;
                var tmpCnt1 = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c === random_negative_index[e]){
                        // console.log("test: " + e + " _ " + random_negative_index[e]);
                        if(sumup_loop + negative_number > 0){
                            tmpCnt = 1;
                        }        
                    }else if(c === zero_index[e]){
                        if(sumup_loop + zero_number > 0){
                            tmpCnt1 = 1;
                        }        
                    }
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(BOBASSESSMENT.general.addZerointoDecimal(n));
                    ansArr.push(sumup_loop);
                }else if (tmpCnt1 != 0){
                    console.log('modified: ' + BOBASSESSMENT.general.addZerointoDecimal(zero_number).toString().replace(/^0+/, ''));
                    console.log('original: ' + BOBASSESSMENT.general.addZerointoDecimal(zero_number))
                    sumup_loop += zero_number;
                    addend.push(BOBASSESSMENT.general.addZerointoDecimal(zero_number).toString().replace(/^0+/, ''));
                    ansArr.push(sumup_loop);
                }else{
                    sumup_loop += negative_number;
                    addend.push(BOBASSESSMENT.general.addZerointoDecimal(negative_number));
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            // console.log(addend);
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];
           
        },
        singleDigitDecimalWithoutLessThanOne: function(rows,negCount) 
        {
            var addend = [];
            var ansArr = [];
            var sumup_loop = 0;
            var random_negative_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);
            // var zero_index = BOBASSESSMENT.general.negativeIndex(rows,negCount);

            for(c=0;c<rows;c++){
                var n = BOBASSESSMENT.general.randomNumberWithDecimal(1, 9, 2);
                    // n = BOBASSESSMENT.general.addZerointoDecimal(n);
                var negative_number = BOBASSESSMENT.general.randomNumberWithDecimal(-9, -1, 2); //Math.floor(Math.random() * 9) -9 //randomIntFromInterval(1, 9)
                    // negative_number = BOBASSESSMENT.general.addZerointoDecimal(negative_number);
                // var zero_number = BOBASSESSMENT.general.randomNumberWithDecimal(0, 1, 2);
                    // zero_number = BOBASSESSMENT.general.addZerointoDecimal(zero_number);
                var tmpCnt = 0;
                var tmpCnt1 = 0;
                for(e=0;e<random_negative_index.length;e++){
                    if(c === random_negative_index[e]){
                        // console.log("test: " + e + " _ " + random_negative_index[e]);
                        if(sumup_loop + negative_number > 0){
                            tmpCnt = 1;
                        }        
                    }
                    // else if(c === zero_index[e]){
                    //     if(sumup_loop + zero_number > 0){
                    //         tmpCnt1 = 1;
                    //     }        
                    // }
                }
                if(tmpCnt == 0){
                    sumup_loop += n;
                    addend.push(BOBASSESSMENT.general.addZerointoDecimal(n));
                    ansArr.push(sumup_loop);
                }
                // else if (tmpCnt1 != 0){
                //     console.log('modified: ' + BOBASSESSMENT.general.addZerointoDecimal(zero_number).toString().replace(/^0+/, ''));
                //     console.log('original: ' + BOBASSESSMENT.general.addZerointoDecimal(zero_number))
                //     sumup_loop += zero_number;
                //     addend.push(BOBASSESSMENT.general.addZerointoDecimal(zero_number).toString().replace(/^0+/, ''));
                //     ansArr.push(sumup_loop);
                // }
                else
                {
                    sumup_loop += negative_number;
                    addend.push(BOBASSESSMENT.general.addZerointoDecimal(negative_number));
                    ansArr.push(sumup_loop);
                }
                // debugger;
            }
            // console.log(addend);
            return [{'sum_items' :addend, 'ans_breakup': ansArr,'answer': sumup_loop}];
           
        }
    }
	
})(jQuery);
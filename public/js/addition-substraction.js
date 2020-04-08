
;var BOBASSESSMENT = {};

;(function($) {

    BOBASSESSMENT.general = {
        randomIntFromInterval: function (min, max) { // min and max included
            return Math.floor(Math.random() * (max - min + 1) + min);
        },
        randomNumberWithDecimal: function genRand(min, max, decimalPlaces) {  
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
                    sumString += "<input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' />";
                }
                sumString += "</td></tr>";
            sumString += "</table>";
            return sumString;
        },
        generateMultiplicationsum: function(arr,vk){
            // console.log(arr);
            sumString = "<table style=' font-size: 20px; font-weight: bold;'>";
            for(y=0;y<(arr['multiplicand']).length;y++){
                sumString += "<tr>";
                sumString += "<td>" + arr['multiplicand'][y] + "</td>";
                sumString += "<td>X</td>";
                sumString += "<td>" + arr['multiplier'][y] + "</td>";
                if(vk == 'yes'){
                    sumString += "<td><input id='answer_input' type='text' readonly='readonly' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' /></td>"; // placeholder='"+arr['answer']+"'
                }else{
                    sumString += "<td><input id='answer_input' type='text' class='text-right pr-1' style='width:100px; border: 1px solid black;' value='' /></td>";
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
	
})(jQuery);
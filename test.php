   <form method="POST" action="progress.php">
    <div id="goalWeight">      
        <label for="goal" id="goalWeights">Goal Weight:</label>
        <input class="inputsWeightProgress" id="goalW" name="goalWeight" type="number" placeholder="">
    </div>
    
    <div>
        <label for="goalType">Goal Type:</label>
        <select id="goalType" name="goalType">
            <option value="lose">Lose Weight</option>
            <option value="gain">Gain Weight</option>
        </select>
    </div>

    <div class="weightAdd">
        <div class="kgs"></div>
        <div id="outputWeight"></div>

        <button id="addBtnWeights" type="button">Weights in kilo
            <img src="../assets/addBtnWeight.png" alt="" height="30">
        </button>

        <div id="inputWeight">
            <button id="xBtnWeight" type="button">x</button>
            <div>
                <label for="weights" id="noOfW">Current Weight:</label>
                <input class="inputsWeightProgress" name="currentWeight" id="weights" type="number" placeholder="">
            </div>

            <button id="addWeights" type="submit">ADD</button>
        </div>
    </div>
</form>
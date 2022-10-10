<?php
if (!empty($_GET['done'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $amount = $_GET['amount'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://currency-conversion-and-exchange-rates.p.rapidapi.com/convert?from=$from&to=$to&amount=$amount",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: currency-conversion-and-exchange-rates.p.rapidapi.com",
            "X-RapidAPI-Key: 41966c2f86mshcbf288416a468e0p162761jsncd9271762498"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($response, true);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>currency converter</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Paytone+One&family=Roboto+Condensed:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
</head>
<!-- component -->
<div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);">
    <div class="absolute bg-gradient-to-b from-green-500 to-green-400 opacity-75 inset-0 z-0"></div>
    <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
        <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
            <div class="self-start hidden lg:flex flex-col  text-white">
                <img src="" class="mb-3">
                <h1 class="mb-3 font-bold text-5xl">Currency Converter</h1>
                <p class="pr-3">Here you can check currency rates of any country.</p>
            </div>
        </div>
        <div class="flex justify-center self-center z-10">
            <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
                <div class="space-y-5">
                    <div class="space-y-2">
                        <form method="get" action="">
                            <label class="text-sm font-medium text-gray-700 tracking-wide">From</label>
                            <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" name="from">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 tracking-wide">To</label>
                        <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" name="to">
                    </div>
                    <div class="space-y-2">
                        <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">Amount</label>
                        <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-lg focus:outline-none focus:border-green-400" type="text" name="amount">
                    </div>
                    <input type="submit" class="w-full flex justify-center bg-green-400  hover:bg-green-500 text-gray-100 p-3  rounded-full tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500" name="done" value="done">
                    </form>
                    <div class="space-y-2">
                        <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                            <!-- here print the results of currency rates -->
                            <h2 style="font-size: 20px">Results:- <?php echo " " . ((!empty($decoded['result'])) ? ($decoded['result']) : ("Please Enter Values")) ?></h2>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
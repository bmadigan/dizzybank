<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <title>Login</title>
</head>

<body class="h-screen font-sans" style="background-color: #F6F6FB;">
    <div class="container mx-auto h-full content-center items-center">

        <div class="flex justify-center">
            <img src="/svgs/logo-color.svg" class="w-48 my-12">
        </div>

        <div class="flex justify-center">
            <div class="w-1/3">
                <h1 class="font-semibold text-gray-600 text-2xl mb-6 text-center">Login to your Account</h1>
                <div class="border-indigo-300 p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label class="font-bold text-gray-700 block mb-2">Username or Email</label>
                        <input type="text"
                            class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray px-2 py-2 rounded shadow"
                            placeholder="Your Username">
                    </div>

                    <div class="mb-4">
                        <label class="font-bold text-gray-700 block mb-2">Password</label>
                        <input type="text"
                            class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray px-2 py-2 rounded shadow"
                            placeholder="Your Password">
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-indigo-500 hover:bg-indigo-400 text-white font-bold py-2 px-4 rounded">
                            Login
                        </button>

                        <a class="no-underline inline-block align-baseline font-bold text-sm text-indigo-700 hover:text-indigo-600 float-right"
                            href="#">
                            Forgot Password?
                        </a>
                    </div>

                </div>
                <div class="text-center">
                    <p class="text-gray-600 text-sm">Don't have an account?
                        <a href="#" class="no-underline text-indigo-600 font-bold">Create an Account</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

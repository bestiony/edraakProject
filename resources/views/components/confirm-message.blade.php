
<div id="box" class="fixed top-1/3 left-1/2 hidden flex-wrap justify-items-center items-center justify-center -translate-x-1/2 bg-white border border-red-500 p-6 w-96 h-44 z-50">
    <p id="message" class="text-2xl w-full text-center">are you sure </p>
    <form id="form" action="" method="POST">
        @csrf
        <button  class="border border-green-500 p-2 text-lg">yes</button>
    </form>
    <a onclick="hideCkecker()" href="" class="border border-red-500 p-2 text-lg">no</a>
</div>

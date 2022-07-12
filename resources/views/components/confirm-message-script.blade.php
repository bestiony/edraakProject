<script>
    function showChecker (destination,prompt,method){
            var box = document.getElementById('box');

            box.classList.remove('hidden');
            box.classList.add('flex');
            var message = document.getElementById('message');
            var form = document.getElementById('form');
            message.innerText = prompt
            form.action = destination
            event.preventDefault();
            form.appendChild(method);
        }
        function hideCkecker(){
            var box = document.getElementById('box');
            box.classList.remove('flex');
            box.classList.add('hidden');
            event.preventDefault();

        }
</script>

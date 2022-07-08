@props(['address'])

<form action="{{route('confirm-order',['oldaddress'=>$address->id])}}"
    class="flex flex-col border p-1 rounded hover:border-orange-400"
    method="POST">
    @csrf
    <p for=""> {{
            $address->address_line_1.", ".
            $address->address_line_2.", ".
            $address->city.", ".
            $address->state.", ".
            $address->postal_code.", ".
            $address->country
        }}</p>
    <button class="rounded bg-orange-500 text-white
        hover:bg-orange-500 px-2 py-1 w-20 self-end ">Use</button>
</form>


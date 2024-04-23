@php
    $user = 'Ashutosh Singh';
    $fruits = ['apple', 'orange', 'banana', 'mange'];
@endphp

<script>
    var data = @json($user);
    console.log(data);

    var fruits = @json($fruits);
    fruits.forEach(element => {
        console.log(element);
    });
</script>

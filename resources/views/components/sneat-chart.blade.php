<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <canvas id="sneatChart{{ $id }}" width="400" height="200"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('sneatChart{{ $id }}').getContext('2d');
        new Chart(ctx, {
            type: @json($type),
            data: @json($data),
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>

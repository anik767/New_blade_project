@props(['skills' => []])

<div class="space-y-6">
    <h3 class="text-2xl font-bold text-black mb-6">Technical Skills</h3>

    @if (!empty($skills))
        <div class="space-y-6">
            @foreach ($skills as $index => $skill)
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-black font-medium text-lg">{{ $skill['name'] }}</span>
                        <span class="text-muted text-sm font-medium">{{ $skill['percentage'] }}%</span>
                    </div>
                    <div class="w-full bg-card rounded-lg h-4 shadow-inner relative overflow-hidden border border-dark">
                        @php
                            $colors = [
                                'from-[#f8a27e] to-orange-500', // accent (#f8a27e)
                                'from-[#59C378] to-green-500', // active (#59C378)
                                'from-blue-400 to-blue-600',
                                'from-purple-400 to-purple-600',
                                'from-pink-400 to-pink-600',
                                'from-yellow-400 to-yellow-600',
                                'from-red-400 to-red-600',
                                'from-indigo-400 to-indigo-600',
                            ];

                            $colorClass = $colors[$index % count($colors)];
                        @endphp
                        <div class="bg-gradient-to-r {{ $colorClass }} h-4 rounded-lg transition-all duration-1000 ease-out shadow-sm"
                            style="width: {{ $skill['percentage'] }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- No skills message -->
        <div class="text-center py-8">
            <p class="text-muted text-lg">No skills added yet.</p>
        </div>
    @endif
</div>

<section class="heros relative">
    @php
    $heroHeadline = $hero['elements']['content-headline']['content'];
    $heroDesc = $hero['elements']['content']['content'];
    $coverImage = $hero['elements']['cover-image']['content'];

    @endphp
    <div class="overlay bg-black w-full h-full absolute bg-opacity-60"></div>
    
    @if(file_exists(public_path('/'.$coverImage)))
    <img class="w-full min-h-[600px] object-cover" src="{{ url($coverImage) }}" alt="gambar">
    @else
    <img class="w-full min-h-[600px] object-cover" src="{{ url('images/heros.png') }}" alt="gambar">
    @endif
    

    <div class="absolute w-full h-full flex flex-col justify-between top-0 right-0 z-10" style="position: absolute;">
        <div class="container flex flex-col justify-center items-end">
            <div class="effect-1 hero-content flex flex-col items-end gap-10 justify-center pt-[120px]">
                {!! $heroHeadline !!}
                {!! $heroDesc !!}
            </div>
        </div>

        {{-- <div class="container flex flex-col justify-center items-end h-full">
            <div class="hero-content flex flex-col items-end gap-6 sm:gap-8 xl:gap-10 justify-center">
                {!! $heroDesc !!}
            </div>
        </div> --}}

        <div class="wrapper-search-dropdown" id="discoverform">
            <form action="{{ url('/discover') }}" method="POST">
                @csrf
                <div class="effect-1 bg-white flex justify-between flex-col sm:flex-row w-[100%] lg:w-[90%] 2xl:w-[85%]">
                    <div class="flex-none relative hidden xl:flex items-center pr-10 pl-6">
                        <svg class="absolute" width="95" height="89" viewBox="0 0 95 89" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.4">
                                <ellipse cx="92.8652" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="92.8652" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="92.8652" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="92.8652" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="92.8652" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="92.8652" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 92.8652 86.8809)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="74.7206" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 74.7206 86.8809)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="56.5722" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 56.5722 86.8809)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="38.4277" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 38.4277 86.8809)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="20.2812" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 20.2812 86.8809)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="2.11905" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 2.11905)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="19.0716" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 19.0716)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="36.0237" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 36.0237)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="52.9762" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 52.9762)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="69.9286" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 69.9286)" fill="#BDBDBD" />
                                <ellipse cx="2.13469" cy="86.8809" rx="2.11905" ry="2.13484"
                                    transform="rotate(90 2.13469 86.8809)" fill="#BDBDBD" />
                            </g>
                        </svg>

                        <h3 class="effect-1 pl-5 heading-2 font-bold text-secondary">DISCOVER</h3>
                    </div>

                    <div
                        class="wrapper-dropdown flex-1 flex flex-col gap-3 sm:gap-0 sm:flex-row py-4 sm:py-4 md:py-6 lg:py-[30px]">
                        <!-- Dropdown 1 -->
                        <div class="drop-down flex-1 px-4 lg:px-6">
                            <div class="flex flex-col w-full">
                                <div class="flex justify-between w-full">
                                    <div x-data="{
                                        open: false,
                                        selected1: '{{ old( 'discoveriam', 'Select')}}' ,
                                        toggle() {
                                            if (this.open) {
                                                return this.close()
                                            }

                                            this.$refs.button.focus()

                                            this.open = true
                                        },
                                        close(focusAfter) {
                                            if (! this.open) return

                                            this.open = false

                                            focusAfter && focusAfter.focus()
                                        } }" 
                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button']" class="relative w-full">

                                        <input type="hidden" name="discoveriam" x-bind:value="selected1">
                                        <!-- Button -->
                                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                            :aria-controls="$id('dropdown-button')" type="button"
                                            class="effect-1 flex items-center gap-3 sm:gap-6  bg-white rounded-md w-full  justify-between sm:justify-start">
                                            <div class="flex flex-col w-full">
                                                <label for="label" class="text-left heading-3 text-gray-3 whitespace-nowrap">I am</label>
                                                <span class="text-left heading-3 font-bold text-navy w-fit" id="select-input-one" x-text="selected1"></span>
                                            </div>
                                            <!-- Heroicon: chevron-down -->
                                            <div class="bg-white p-[3px] rounded-full"
                                                style="box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.16);">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.7105 15.54L18.3605 9.87998C18.4542 9.78702 18.5286 9.67642 18.5793 9.55456C18.6301 9.4327 18.6562 9.30199 18.6562 9.16998C18.6562 9.03797 18.6301 8.90726 18.5793 8.78541C18.5286 8.66355 18.4542 8.55294 18.3605 8.45998C18.1731 8.27373 17.9196 8.16919 17.6555 8.16919C17.3913 8.16919 17.1378 8.27373 16.9505 8.45998L11.9505 13.41L7.00045 8.45998C6.81309 8.27373 6.55964 8.16919 6.29545 8.16919C6.03127 8.16919 5.77781 8.27373 5.59045 8.45998C5.49596 8.5526 5.42079 8.66304 5.3693 8.78492C5.3178 8.90679 5.291 9.03767 5.29045 9.16998C5.291 9.30229 5.3178 9.43317 5.3693 9.55505C5.42079 9.67692 5.49596 9.78737 5.59045 9.87998L11.2405 15.54C11.3341 15.6415 11.4477 15.7225 11.5742 15.7779C11.7007 15.8333 11.8373 15.8619 11.9755 15.8619C12.1136 15.8619 12.2502 15.8333 12.3767 15.7779C12.5032 15.7225 12.6168 15.6415 12.7105 15.54Z"
                                                        fill="#1C2841" />
                                                </svg>

                                            </div>
                                        </button>

                                        <!-- Panel -->
                                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                            style="display: none;"
                                            class="absolute left-0 mt-2 w-40 z-10 rounded-md bg-white shadow-md">
                                            @forelse ($discoverItemsOne as $item)
                                                <span
                                                    class="hover:cursor-pointer flex text-navy font-bold items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500"
                                                    x-on:click="selected1 = '{{ $item->value }}'; toggle();"
                                                    >
                                                    {{ $item->value }}
                                                </span>
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                        @error('discoveriam')
                                        <div x-show="selected1 === 'Select'" class="alert alert-danger" style="margin-top: 4px!important" role="alert">
                                            <strong>Selected Jobs</strong> required!
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dropdown 2 -->
                        <div class="drop-down flex-1 px-4 lg:px-6">
                            <div class="flex flex-col w-full">
                                <div class="flex justify-between w-full">
                                    <div x-data="{
                                        open: false,
                                        selected2: '{{ old( 'discoverwork', 'Select')}}',
                                        toggle() {
                                            if (this.open) {
                                                return this.close()
                                            }

                                            this.$refs.button.focus()

                                            this.open = true
                                        },
                                        close(focusAfter) {
                                            if (! this.open) return

                                            this.open = false

                                            focusAfter && focusAfter.focus()
                                        } }" 
                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button']" class="relative w-full">
                                        <input type="hidden" name="discoverwork" x-bind:value="selected2">
                                        <!-- Button -->
                                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                            :aria-controls="$id('dropdown-button')" type="button"
                                            class="effect-2 flex items-center gap-3 sm:gap-6  bg-white rounded-md w-full  justify-between sm:justify-start">
                                            <div class="flex flex-col w-full">
                                                <label for="label" class="text-left heading-3 text-gray-3 whitespace-nowrap">Working
                                                    in</label>
                                                <span class="text-left heading-3 font-bold text-navy w-fit" id="select-input-two" x-text="selected2"></span>
                                            </div>
                                            <!-- Heroicon: chevron-down -->
                                            <div class="bg-white p-[3px] rounded-full"
                                                style="box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.16);">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.7105 15.54L18.3605 9.87998C18.4542 9.78702 18.5286 9.67642 18.5793 9.55456C18.6301 9.4327 18.6562 9.30199 18.6562 9.16998C18.6562 9.03797 18.6301 8.90726 18.5793 8.78541C18.5286 8.66355 18.4542 8.55294 18.3605 8.45998C18.1731 8.27373 17.9196 8.16919 17.6555 8.16919C17.3913 8.16919 17.1378 8.27373 16.9505 8.45998L11.9505 13.41L7.00045 8.45998C6.81309 8.27373 6.55964 8.16919 6.29545 8.16919C6.03127 8.16919 5.77781 8.27373 5.59045 8.45998C5.49596 8.5526 5.42079 8.66304 5.3693 8.78492C5.3178 8.90679 5.291 9.03767 5.29045 9.16998C5.291 9.30229 5.3178 9.43317 5.3693 9.55505C5.42079 9.67692 5.49596 9.78737 5.59045 9.87998L11.2405 15.54C11.3341 15.6415 11.4477 15.7225 11.5742 15.7779C11.7007 15.8333 11.8373 15.8619 11.9755 15.8619C12.1136 15.8619 12.2502 15.8333 12.3767 15.7779C12.5032 15.7225 12.6168 15.6415 12.7105 15.54Z"
                                                        fill="#1C2841" />
                                                </svg>
                                            </div>
                                        </button>
                                        <!-- Panel -->
                                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                            style="display: none;"
                                            class="absolute left-0 mt-2 w-40 z-10 rounded-md bg-white shadow-md">
                                            @forelse ($discoverItemsTwo as $item)
                                                <span
                                                    class="hover:cursor-pointer flex text-navy font-bold items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500"
                                                    x-on:click="selected2 = '{{ $item->value }}'; toggle()"
                                                    >
                                                    {{ $item->value }}
                                                </span>
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                        @error('discoverwork')
                                        <div x-show="selected2 === 'Select'" class="alert alert-danger" style="margin-top: 4px!important" role="alert">
                                            <strong>Selected Work</strong> required!
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- dropdown 3 -->
                        <div class="drop-down flex-1 px-4 lg:px-6">
                            <div class="flex flex-col w-full">
                                <div class="flex justify-betwee:justify-center">
                                    <div x-data="{
                                        open: false,
                                        selected3: '{{ old( 'discoverfor', 'Select')}}',
                                        selectedTarget:'',
                                        toggle() {
                                            if (this.open) {
                                                return this.close()
                                            }
                                            this.$refs.button.focus()
                                            this.open = true
                                        },
                                        close(focusAfter) {
                                            if (! this.open) return
                                            this.open = false
                                            focusAfter && focusAfter.focus()
                                        } }" 
                                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                        x-id="['dropdown-button']" class="relative w-full">

                                        <input type="hidden" name="discoverfor" x-bind:value="selected3">
                                        <input type="hidden" name="discovertarget" x-bind:value="selectedTarget">
                                        <!-- Button -->
                                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                            :aria-controls="$id('dropdown-button')" type="button"
                                            class="effect-3 flex items-center gap-3 sm:gap-6  bg-white rounded-md w-full  justify-between sm:justify-start">
                                            <div class="flex flex-col w-full">
                                                <label for="label" class=" heading-3 text-left text-gray-3 whitespace-nowrap">Searching
                                                    for</label>
                                                <span class="text-left heading-3 font-bold text-navy w-fit" id="select-input-three" x-text="selected3" x-transition></span>
                                            </div>
                                            <!-- Heroicon: chevron-down -->
                                            <div class="bg-white p-[3px] rounded-full"
                                                style="box-shadow: 0px 4px 24px rgba(0, 0, 0, 0.16);">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.7105 15.54L18.3605 9.87998C18.4542 9.78702 18.5286 9.67642 18.5793 9.55456C18.6301 9.4327 18.6562 9.30199 18.6562 9.16998C18.6562 9.03797 18.6301 8.90726 18.5793 8.78541C18.5286 8.66355 18.4542 8.55294 18.3605 8.45998C18.1731 8.27373 17.9196 8.16919 17.6555 8.16919C17.3913 8.16919 17.1378 8.27373 16.9505 8.45998L11.9505 13.41L7.00045 8.45998C6.81309 8.27373 6.55964 8.16919 6.29545 8.16919C6.03127 8.16919 5.77781 8.27373 5.59045 8.45998C5.49596 8.5526 5.42079 8.66304 5.3693 8.78492C5.3178 8.90679 5.291 9.03767 5.29045 9.16998C5.291 9.30229 5.3178 9.43317 5.3693 9.55505C5.42079 9.67692 5.49596 9.78737 5.59045 9.87998L11.2405 15.54C11.3341 15.6415 11.4477 15.7225 11.5742 15.7779C11.7007 15.8333 11.8373 15.8619 11.9755 15.8619C12.1136 15.8619 12.2502 15.8333 12.3767 15.7779C12.5032 15.7225 12.6168 15.6415 12.7105 15.54Z"
                                                        fill="#1C2841" />
                                                </svg>

                                            </div>
                                        </button>
                                        <!-- Panel -->
                                        <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                            x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                            style="display: none;"
                                            class="absolute left-0 mt-2 w-40 z-10 rounded-md bg-white shadow-md">
                                            @forelse ($discoverItemsThree as $item)
                                                <span
                                                    class="hover:cursor-pointer flex text-navy font-bold items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500"
                                                    x-on:click="selected3 = '{{ $item->value }}'; selectedTarget = '{{ $item->target }}'; toggle();"
                                                    >
                                                    {{ $item->value }}
                                                </span>
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                        @error('discoverfor')
                                        <div x-show="selected3 === 'Select'" class="alert alert-danger" style="margin-top: 4px!important" role="alert">
                                            <strong>Selected Discover For</strong> required!
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button Submit -->
                    <button
                        class="flex-none effect-4 bg-primary heading-1 text-white font-bold py-4 sm:py-6 sm:px-6 md:px-8 lg:px-10 uppercase">Go</button>
                </div>
            </form>
        </div>
    </div>

</section>

<div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . Str::plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach($answers as $answer)
                        <div class="media">
                                <div class="d-flex flex-column vote-control">
                                        <a title="This answer is useful" class="vote-up">
                                            <i class="fas fa-caret-up fa-3x"></i>
                                        </a>
                                        <span class="votes-count">1234</span>
                                        <a title="This answer is not useful" class="vote-down off">
                                            <i class="fas fa-caret-down fa-3x"></i>
                                        </a>
                                        @can('accept', $answer)
                                        <a title="Mark this answer as best answer"
                                         class="{{ $answer->status}} mt-2"
                                        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <form style="display:none" method="POST" action="{{ route('answers.accept', $answer->id)}}" id="accept-answer-{{ $answer->id }}">
                                        @csrf
                                    </form>
                                    @else
                                        @if ($answer->is_best)
                                            <a title="The questions owner accepted this as best answer"
                                            class="{{ $answer->status}} mt-2"
                                            >
                                            <i class="fas fa-check"></i>
                                        </a>
                                        @endif
                                    @endcan
                                    </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                            <div class="ml-auto">
                                                    @can('update', $answer)
                                                        <a href="{{ route('questions.answers.edit', [$question->id, $answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                                    @endcan
        
                                                    @if (Auth::user()->can('delete', $answer))
                                                        <form class="form-delete" action="{{ route('questions.answers.destroy', [$question->id, $answer->id])}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                         </form>
                                                    @endif
                                                </div>

                                    </div>
                                    <div class="col-4">
                                        
                                    </div>
                                    <div class="col-4">
                                            <span class="text-muted">
                                                Answerd {{ $answer->created_date }}
                                            </span>
                                            <div class="media mt-1">
                                                <a href="{{ $answer->user->url }}" class="pr-2">
                                                    <img src="{{ $answer->user->avatar }}" alt="">
                                                </a>
                                                <div class="media-body mt-1">
                                                    <a href="{{ $answer->user->url }}">
                                                        {{ $answer->user->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                {{-- {{ $answer->body }} --}}
                                
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
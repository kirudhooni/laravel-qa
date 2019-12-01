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
                                        <a title="Mark this answer as best answer" class="vote-accepted mt-2">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                {{-- {{ $answer->body }} --}}
                                <div class="float-right">
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
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
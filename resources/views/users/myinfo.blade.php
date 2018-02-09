<div id="profile" class="tab-pane">
    <section class="panel">
        <div class="bio-graph-heading">
            {{ $user->bio }}
        </div>
        <div class="panel-body bio-graph-info">
            <h1>Bio Graph</h1>
            <div class="row">
                <div class="bio-row">
                    <p><span>Name </span>: {{ $user->name }} </p>
                </div>
                <div class="bio-row">
                    <p><span>Birthday</span>: {{ $user->birthday }}</p>
                </div>
                <div class="bio-row">
                    <p><span>City </span>: {{ $user->city }}</p>
                </div>
                <div class="bio-row">
                    <p><span>Occupation </span>: {{ $user->occupation }}</p>
                </div>
                <div class="bio-row">
                    <p><span>Email </span>: {{ $user->email }}</p>
                </div>
                <div class="bio-row">
                    <p><span>Mobile </span>: {{ $user->phone }}</p>
                </div>
                <div class="bio-row">
                    <p><span>Blood Group </span>: {{ $user->blood_group }}</p>
                </div>
                <div class="bio-row">
                    <p><span>Address  </span>: {{ $user->address }}</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row">
        </div>
    </section>
</div>
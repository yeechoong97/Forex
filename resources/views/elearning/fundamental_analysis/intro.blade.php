@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="elearning-container">
    <div class="row elearning-subcontainer" >
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="height: 2080px;">
            <div class="sidenav-content-details">
                <h3 id="learning-title">Fundamental Analysis Introduction</h3>
                <img src ="{{asset('pictures/Fundamental.png')}}" class="img-padding" >
                <p>Fundamental Analysis is a broad term that describes the act of trading based purely on global aspects that influence supply and demand of currencies, commodities, and equities. Many traders will use both fundamental and technical methods to determine when and where to place trades, but they also tend to favor one over the other. However, if you would like to use only fundamental analysis, there are a variety of sources to base your opinion.</p>
                <h5>Central Banks</h5>
                <p>Central banks are likely one of the most volatile sources for fundamental trading. The list of actions they can take is vast; they can raise interest rates, lower them (even into negative territory), keep them the same, suggest their stance will change soon, introduce non-traditional policies, intervene for themselves or others, or even revalue their currency. Fundamental analysis of central banks is often a process of poring through statements and speeches by central bankers along with attempting to think like them to predict their next move.</p>
                <h5>Economic Releases</h5>
                <p>Trading economic releases can be a very tenuous and unpredictable challenge. Many of the greatest minds at the major investment banks around the world have a difficult time predicting exactly what an economic release will ultimately end up being. They have models that take many different aspects into account, but can still be embarrassingly wrong in their predictions; hence the reason that markets move so violently after important economic releases. Many investors tend to go with the “consensus” of those experts, and typically markets will move in the direction of the consensus prediction before the release. If the consensus fails to predict the final result, the market then usually moves in the direction of the actual result – meaning that if it was better than consensus, a positive reaction unfolds and vice versa for a less-than-consensus result. The trick to trading the fundamental aspect of economic releases is to determine when you want to make your commitment. Do you trade before or after the figure is released? Both have their merits and their detractions. If you trade well before the release, you can try to take advantage of the flow toward the consensus expectation, but other fundamental events around the world can impact the market more than the consensus read. Trading moments before the economic release means that you have an opinion on whether the actual release will be better or worse than the consensus, but you could be dreadfully wrong and risk large losses on essentially a coin flip. Trading moments after the economic release means that you will be trying to establish a position in a low-volume market which presents the challenge of getting your desired price.</p>
                <h5>Geopolitical Tensions</h5>
                <p>Like it or not, some countries around the world don’t get along very nicely with each other or the global community and conflicts or wars are sometimes imminent. These tensions or conflicts can have an adverse impact on tradable goods by changing the supply or even the demand for certain products. For instance, increased conflict in the Middle East can put a strain on the supply of oil which then makes the price increase. Conversely, a relative calm in that part of the world can decrease the price of oil as supply isn’t threatened. Being able to properly predict how these events will conclude may be a way to get ahead of the market with your fundamental perspective.</p>
                <h5>Weather</h5>
                <p>There are a variety of weather-related events that can cause prices to fluctuate. The easiest example is the propensity for winter to create massive snow storms that can drive up the cost of natural gas, which is used to heat homes. However, there are a variety of other weather situations that can change the value of tradable goods such as hurricanes, droughts, floods, and even tornados. While some of these events are very unpredictable, sometimes it can help to break out the old Farmer’s Almanac or pay close attention to the Weather Channel to see how weather patterns might unfold.</p>
                <h5>Seasonality</h5>
                <p>The seasonality as related to weather is something that makes sense as the natural gas example pointed out above, but there are other seasonal factors that aren’t related to weather as well. For instance, at the end of the calendar year many investors will sell equities that have declined throughout the year in order to claim capital losses on their taxes. Sometimes it may be beneficial to exit positions before the year-end selloff begins. On the other side of that equation, investors typically come back to equities in droves in January, a phenomenon called “The January Effect.” The end of a month can be rather active as well as businesses that sell products in multiple nations look to offset their currency hedges, a practice termed “Month-End Rebalancing.”</p>
                <p>Some fundamental factors are more long-lasting while others are more immediate, but trading them can be both difficult and rewarding for those who have the intestinal fortitude to trade them. Also, the fundamental factors listed above are just the start to a list that is much longer in length as new fundamental methods of trading are created every day. So keep your eyes open for new situations that arise and maybe you could be fundamentally ahead of the curve!</p>
                <p>*Adapted from <b>Forex.com. (2021). What Is Fundamental Analysis. https://www.forex.com/en/education/resources-by-level/beginner/what-is-fundamental-analysis/</b></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop
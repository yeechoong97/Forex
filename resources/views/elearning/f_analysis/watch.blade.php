@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div style="margin: 20px;margin-bottom: 20px;margin-top: 130px;height: 680px;">
    <div class="row" style="height: 680px;margin-right: 0px;margin-left: 0px;">
        @include('elearning.side-nav')
        <div class="col-md-6 col-xl-10 offset-xl-0 sidenav-con" style="margin-bottom: 0px;margin-left: 0px;margin-top: 0px;height: 4780px;">
            <div class="sidenav-content-details">
            <h3 id="learning-title">What to Watch</h3>
            <img src ="{{asset('pictures/Report.png')}}" class="img-padding" >
            <p>Here are some of the economic terms, events, and reports that U.S. traders should know and watch, including a brief explanation of why they are important to investors.</p>
            <ol>
                <b class="l-size"><li>Federal Open Market Committee (FOMC) Meetings and Policy Announcements</li></b>
                The FOMC consists of seven governors of the Federal Reserve Board and five Federal Reserve Bank presidents. The FOMC meets eight times a year—roughly every six weeks—to determine the near-term direction of monetary policy. Whether there is a change in rates or not, the FOMC announces its decision immediately after FOMC meetings.
                <br><br>
                A few accompanying statements the Fed may make after announcing any adjustments in interest rates may have as much influence on markets as a change or no change in rates themselves. For example, the FOMC may take a “neutral” stance on the outlook for the economy. Or it may point to prospects for growth or suggest the potential for economic weakness or inflationary pressures. The FOMC actions or comments can have a powerful impact on markets.
                <b class="l-size"><li>Treasury Bonds, Bills, and Notes</li></b>
                The U.S. government issues several different kinds of bonds through the Bureau of the Public Debt, an agency of the U.S. Department of the Treasury. Treasury debt securities are classified according to their maturities:
                <ul>
                    <li>Treasury bills have maturities of 1 year or less.</li>
                    <li>Treasury notes have maturities of 2 to 10 years.</li>
                    <li>Treasury bonds have maturities of more than 10 years.</li>
                </ul>
                Treasury bonds, bills, and notes are all issued in face values of $1,000, though there are different purchase minimums for each type of security.
                <b class="l-size"><li>Interest Rates, Financial Markets and Bonds</li></b>
                U.S. Treasury bonds, by virtually any definition, are simply a loan. The U.S. government borrows the funds it needs to operate, including financing the federal deficit. Ultimately, taxpayers will have to pay back the loan.
                <br><br>
                When a bond is issued, the price you pay is known as its face value. Once you buy it, the government promises to pay you back on a specific day known as the maturity date. It issues that instrument at a predetermined rate of interest, called the coupon. For instance, if you buy a bond with a $1,000 face value, a 6 percent coupon, and a 10-year maturity, you would collect interest payments totaling $60 in each of those 10 years. When the decade is up, you get back your $1,000.
                <br><br>
                If you buy a U.S. Treasury bond and hold it until maturity, you will know exactly how much you’re going to get back. That’s why bonds are also known as fixed-income investments—they guarantee you a continuous set income backed by the U.S. government. What confuses most investors in bonds is the concept of yield and price. Simply stated, when yield goes up, price goes down, and vice versa.
            </ol>     
            <h5>Types of Government Reports</h5>
            <ul>
                <b class="l-size"><li>Beige Book</li></b>
                A combination of economic conditions from each of the 12 Federal Reserve regional districts, the Beige Book is aptly named because of the color of its cover (really). This report is usually released two weeks before the monetary policy meetings of the FOMC. The information on economic conditions is then used by the FOMC to set interest rate policy. If the Beige Book portrays an overheating economy or inflationary pressures, the Fed may be more inclined to raise interest rates to moderate the economic pace. Conversely, if the Beige Book portrays economic difficulties or recession conditions, the Fed may see a need to lower interest rates to stimulate activity.
                <b class="l-size"><li>Gross Domestic Product (GDP)</li></b>
                GDP is the broadest measure of aggregate economic activity and accounts for almost every sector of the economy. Analysts use this figure to track the economy’s overall performance because it usually indicates how strong or weak the economy is and helps to predict the potential profit margin for companies. It also helps analysts determine whether economic growth is accelerating or slowing down. The stock market likes to see healthy economic growth because that translates to higher corporate profits and higher share values.
                <b class="l-size"><li>International Trade and Current Account Figures</li></b>
                These numbers measure the difference between imports and exports of both goods and services. Changes in the level of imports and exports are an important tool for gauging economic trends, both domestically and overseas. These reports can have a profound effect on the value of the dollar. That value, in turn, can help or hurt multinational corporations whose profits overseas can diminish when they convert their funds back to the United States, especially if the U.S. dollar is overvalued. Another valuable aspect of such reports is that imports can help to indicate U.S. demand for foreign goods, and exports may show demand for U.S. goods in overseas countries.
                <b class="l-size"><li>Index of Leading Economic Indicators (LEI)</li></b>
                This report is a composite index of 10 economic indicators that typically lead overall economic activity. The LEI index helps to predict the health of the economy and may be an early clue about the prospects for recession or economic expansion.
                <b class="l-size"><li>Consumer Price Index (CPI)</li></b>
                The CPI measures the average price level of goods and services purchased by consumers and is the most widely followed indicator of inflation in the United States. Monthly changes represent the inflation rate that is quoted widely and influences a number of markets.
                <br><br>
                Inflation is a general increase in the price of goods and services. The relationship between inflation and interest rates is the key to understanding how data such as the CPI influence the markets. Higher energy prices, manufacturing cost increases, medical costs, imbalances in global supply and demand of raw materials, and prices of food products all weigh on this report. For example, if gas prices at the pump escalate and the cost to fill up your car rises from, say, $30 a week to $50 or even $60 a week, you will have less spending money for other items. It may not affect you immediately, but a longer duration of higher prices will hit your pocketbook.
                <br><br>
                Even weather can be a factor for short-term changes in food prices. What would be the cost of tomatoes at the grocery store after a damaging freeze in California or in Georgia? Maybe $3 or $4 per pound? Any grocery shopper can probably recall when such price spikes occurred. The restaurants that serve salads lose revenue as well as the farmer whose crop is destroyed.
                <br><br>
                These factors all play a part in the CPI number. The core rate is the inflation number that excludes the volatile food and energy components. Economists track these numbers; you should, too.
                <b class="l-size"><li>Producer Price Index (PPI)</li></b>
                Formerly known as the Wholesale Price Index, the PPI is a measure of the average prices for a fixed basket of capital and consumer goods paid by producers. The PPI measures price changes in the manufacturing sector. The inflation rate may depend on a general increase in the prices of goods and services.
                <b class="l-size"><li>Institute of Supply Management (ISM) Index</li></b>
                Formerly known as the National Association of Purchasing Managers (NAPM) survey, the ISM report provides a composite diffusion index of national manufacturing conditions. Readings above 50 percent indicate an expanding factory sector, readings below 50 percent, a contracting sector. The ISM Index helps economists and analysts get a detailed look at the manufacturing sector of the economy, a major source of economic strength that can have a bearing on the nation’s employment situation, a key to economic health.
                <b class="l-size"><li>Durable Goods Orders</li></b>
                This report (Manufacturers’ Shipments, Inventories, and Orders) reflects new orders placed with domestic manufacturers for immediate and future delivery of factory-made products. Orders for durable goods show how busy factories will be in the months to come as manufacturers work to fill those orders. The data not only provide insight into demand for things like washers, dryers, and cars but also take the temperature of the strength of the economy going forward.
                <b class="l-size"><li>Industrial Production and Capacity Utilization</li></b>
                These rates measure the physical output of the nation’s factories, mines, and utilities and reflect the usage level of available resources. Because the manufacturing sector accounts for an estimated one-quarter of the economy, these reports can sometimes have a big impact on stock and financial market movement. The capacity utilization rate provides an estimate of how much factory capacity is in use. If the utilization rate gets too high (above 85 percent), it can lead to inflationary pressures.
                <b class="l-size"><li>Factory Orders</li></b>
                The dollar level of new orders for manufacturing durable and nondurable goods shows the potential for factories to increase or decrease activity based on the amount of orders they receive. This report provides insight into the demand for not only hard goods such as refrigerators and cars, but also nondurable items such as cigarettes and apparel. 
                <b class="l-size"><li>Business Inventories</li></b>
                Fed Chairman Alan Greenspan is said to be among those who watch the report of business inventories, so you should become familiar with it as well. This report shows the dollar amount of inventories held by manufacturers, wholesalers, and retailers. The level of inventories in relation to sales is an important indicator for the future direction of factory production.
                <b class="l-size"><li>Employment Cost Index (ECI)</li></b>
                The ECI provides a measure of total employee compensation costs, including wages and salaries as well as benefits. It is the broadest measure of labor costs and helps analysts determine trends in the cost that employers have from paying employees. This measure can give economists a clue as to whether inflation is perking up from a cost of business standpoint. If a company needs to pay more to hire qualified workers, then the cost of doing business increases and profit margins are reduced. Companies usually have to raise their prices to consumers as their costs increase. That is when the inflation theme starts to play out.
                <b class="l-size"><li>Productivity and Costs</li></b>
                Productivity measures the growth of labor efficiency in producing the economy’s goods and services. Unit labor costs reflect the labor costs of producing each unit of output. Both are followed as indicators of future inflationary trends. Productivity growth is critical because it allows for higher wages and faster economic growth without inflationary consequences.
                <b class="l-size"><li>Personal Income and Spending</li></b>
                Personal income is the estimated dollar amount of income received by Americans. Personal spending is the estimated dollar amount that consumers use for purchases of durable and nondurable goods and services. This economic number is important because if consumers are spending more than they make, the spending will stop eventually, thus causing a downturn in the economy. Another aspect to consider is that consumers who save may be investing in the markets, and that activity can increase the value of stock prices. In addition, it can also add liquidity to the banking system if the money goes to savings or money market accounts.
                <b class="l-size"><li>Retail Sales</li></b>
                Retail sales numbers measure the total sales at stores that sell durable and nondurable goods. These figures can reveal the spending habits of consumers, and the trend of those spending sprees, more often than not, can influence analysts’ expectations for future developments in the economy.
                <b class="l-size"><li>Consumer Credit</li></b>
                One of the American consumers’ pastimes is to say “Charge it” to purchase goods and services on their credit cards. Overall changes in consumer credit can indicate the condition of individual consumer finances. On the one hand, economic activity is stimulated when consumers borrow within their means to buy cars and other major purchases. On the other hand, if consumers pile up too much debt relative to their income levels, they may have to stop spending on new goods and services just to pay off old debts. That stoppage could put a big dent in future economic growth.
                <br><br>
                The demand for credit can also have a direct effect on interest rates. If the demand to borrow money exceeds the supply of willing lenders, interest rates rise. If credit demand falls and many willing lenders are fighting for customers, they may offer lower interest rates to attract business.             
            </ul>       
            <p>*Adapted from "<b>A Complete Guide to Technical Trading Tactics</b>" by <b>John L. Person</b></p>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/elearning.js')}}"></script>   
@stop
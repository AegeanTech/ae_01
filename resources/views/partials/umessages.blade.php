<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
        <span id="umessage_notification" class="label label-warning umessage_warning">{{ $umessages_count }}</span>
    </a>
    <ul class=" notifications dropdown-menu">
        <li class="dropdown-title">
            @if($umessages_count == 0)
                {!! '<span id="umessage_notification_msg"> Δεν έχετε καμία νέα ειδοποίηση!</span>' !!}
            @elseif($umessages_count == 1)
                {!!  '<span id="umessage_notification_msg">Έχετε ' . $umessages_count . ' νέα ειδοποίηση!</span>' !!}
            @else
                {!!  '<span id="umessage_notification_msg">Έχετε ' . $umessages_count . ' νέες ειδοποιήσεις!</span>'  !!}
            @endif
        </li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul id="umessage_list" class="menu">
                @if ((isset($umessages_danger_count)) && ($umessages_danger_count > 0))
                    <li id="umessages_danger_list">
                        <i class="livicon danger" data-n="warning" data-s="20" data-c="white" data-hc="white"></i>
                        @if($umessages_danger_count == 1)
                            <h5><span id="umessage_danger_notification">{!! $umessages_danger_count !!}</span><span id="umessage_danger_msg">&nbsp; Σημαντική Ειδοποίηση</span></h5>
                        @else
                            <h5><span id="umessage_danger_notification">{!! $umessages_danger_count !!}</span><span id="umessage_danger_msg">&nbsp; Νέες Σημαντικές Ειδοποιήσεις</span></h5>
                        @endif
                    </li>
                @endif
                @if ((isset($umessages_warning_count)) && ($umessages_warning_count > 0))
                    <li>
                        <i class="livicon warning" data-n="warning-alt" data-s="20" data-c="white" data-hc="white"></i>
                        @if($umessages_warning_count == 1)
                            <h5>{!! $umessages_warning_count . ' Νέα Προειδοποίηση' !!}</h5>
                        @else
                            <h5>{!! $umessages_warning_count . ' Νέες Προειδοποιήσεις' !!}</h5>
                        @endif
                    </li>
                @endif
                @if ((isset($umessages_success_count)) && ($umessages_success_count > 0))
                    <li id="umessages_success_list">
                        <i class="livicon success" data-n="info" data-s="20" data-c="white" data-hc="white"></i>
                        @if($umessages_success_count == 1)
                            <h5><span id="umessage_success_notification">{!! $umessages_success_count !!}</span><span id="umessage_success_msg">&nbsp; Νέα Ενημέρωση</span></h5>
                        @else
                            <h5><span id="umessage_success_notification">{!! $umessages_success_count !!}</span><span id="umessage_success_msg">&nbsp; Νέες Ενημερώσεις</span></h5>
                        @endif
                    </li>
                @endif
                @if ((isset($umessages_info_count)) && ($umessages_info_count > 0))
                    <li>
                        <i class="livicon info" data-n="check-circle-alt" data-s="20" data-c="white" data-hc="white"></i>
                        @if($umessages_info_count == 1)
                            <h5>{!! $umessages_info_count . ' Ειδοποίηση' !!}</h5>
                        @else
                            <h5>{!! $umessages_info_count . ' Νέες Ειδοποιήσεις' !!}</h5>
                        @endif
                    </li>
                @endif
            </ul>
        </li>
        <li class="footer">
            <a href="{{ URL::to('admin/umessages') }}">Προβολή Όλων</a>
        </li>
    </ul>
</li>
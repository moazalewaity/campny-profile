@extends('front.layouts.app')


@section('title', $dep['title'])

@section('body')
<div class="single-page sidebar-right">
    <div class="article-wrap bkwrapper container" itemscope itemtype="http://schema.org/Article">
        <div class="article-content-wrap">
            <div class="row bksection bk-in-single-page clearfix">
                <div class="main col-md-8">
                    <div class="page-title">
                        <h2 class="heading"><span>{{ $dep['title'] }}</span></h2>
                        <div class="bk-breadcrumbs-wrap">
                            <div class="breadcrumbs">
                                <span itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="{{ url('/') }}"><span itemprop="title">{{ trans('front.home') }}</span></a>
                                </span>
                                <span class="delim">&rsaquo;</span>
                                <span class="current">{{ trans('front.Category') }} : &quot;{{ $dep['name'] }}&quot;</span>
                            </div>
                        </div>
                    </div>  
                    <div class="row">              
                        <table width="100%" dir="rtl" align="center" border="0" cellpadding="0" cellspacing="0">
                            @foreach($db_all as $row)
                                <tr >
                                    <td width="50%"  align="center" valign="top">
                                        <table id="{{ $row->pk_obj }}_{{ $row->pk_year}}" width="100%" border="0" cellspacing="2" cellpadding="2" style="font-size:14px" >
                                            <tr>
                                                <td width="16%" align="center">
                                                    <img src="{{ url('/front/images/OfficialPalestineStatePin.gif') }}" width="71" height="100" />
                                                </td>
                                                <td width="84%" align="center">
                                                    <strong>السلطة الوطنية الفلسطينية<br />سلطة الأراضي الفلسطينية<br />الإدارة العامة للأراضي والعقارات</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="right" dir="rtl">
                                                <font style=" font-size: 18px">
                                                    <strong>إعلان بيع أرض بموجب وكالة لدى الإدارة العامة للأراضي والعقارات   ({{ $row->pk_obj}}/{{ $row->pk_year }} )</strong>
                                                </font>
                                                <br />
                                                يعلن للعموم أنه تقدم للإدارة العامة للاراضي والعقارات بغزة السيد: 
                                                <br />
                                                @foreach($row->clients as $c_row)
                                                    - {{ $c_row->agency_name }} من سكان {{ $c_row->from_city}} رقم الهوية {{ $c_row->from_doc_no}}<br />
                                                @endforeach
                                                <strong>بصفته وكيلا عن:</strong>
                                                <br />
                                                {{ $row->client_name}}
                                                <br />
                                                <strong> بموجب وكالة / وكالات رقم :</strong>
                                                <br />
                                                @foreach($row->agency as $ag_row)
                                                    - رقم {{ $ag_row->agency_no}} / {{ $ag_row->agency_year}} الصادرة عن {{ $ag_row->ageny_city }}<br />
                                                @endforeach
                                                <strong>موضوع الوكالة</strong> إجراء معاملة (انتقال إرث // بيع // مبادلة) في:
                                                <br />
                                                @foreach($row->details as $d_row)
                                                    - المدينة {{ $d_row->city}} - قطعة {{ $d_row->block_no}} - قسيمة {{ $d_row->copoun_no}}<br />
                                                @endforeach
                                                فمن له أي اعتراض بهذا الشأن عليه التقدم باعتراضه إلى الإدارة العامة للاراضي والعقارات خلال مدة اقصاها خمسة عشر يوما من تاريخ الإعلان وبخلاف ذلك سوف يتم البدء في إجراءات فتح المعاملة.<br />
                                                    <div align="left">مسجل أراضي غزة
                                                      <br />
                                                      أ. {{ $row->gaza_reg_name}}
                                                    </div>
                                                    <div align="right">تاريخ النشر: {{ $row->publish_date}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="col-md-12">
                          {{ $db_all->links() }}
                        </div>
                    </div>
                </div>
                <div class="sidebar col-md-4">
                    <aside class="sidebar-wrap stick" id="bk-single-sidebar">
                        @include('front.sidebar')
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection

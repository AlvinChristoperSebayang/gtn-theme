<template>
     <Loading
        v-model:active="isLoading"
        :can-cancel="false"
        :is-full-page="true"
    />
    <transition>
        <div class="flex gap-8 flex-col justify-center pricing-form pb-20 lg:pb-[187px]">
            <div class="w-full left">
                <div class="flex flex-col gap-8 h-fit">
                    <div class="flex flex-col gap-4 available-service">
                        <div class="services-label relative">
                            <p class="body-1 font-medium leading-[22.4px] tracking-[0.32px text-black]">Services</p>
                            <div class="relative">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="peer relative z-10 lg:z-20">
                                    <path
                                        d="M10.0001 17.7901C14.3025 17.7901 17.7903 14.3024 17.7903 9.99998C17.7903 5.69761 14.3025 2.20984 10.0001 2.20984C5.69773 2.20984 2.20996 5.69761 2.20996 9.99998C2.20996 14.3024 5.69773 17.7901 10.0001 17.7901Z"
                                        stroke="#020B1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M11.1005 13.3082L10.8335 13.3082C10.3732 13.3082 10.0001 12.9351 10.0001 12.4749L10.0001 9.4054L9.41113 9.4054"
                                        stroke="#020B1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="10.0001" cy="6.85017" r="0.867988" fill="#020B1F" />
                                </svg>
                                <div
                                    class="w-[268px] h-fit rounded-xl bg-[#020B1F] absolute max-lg:overflow-hidden max-lg:z-[999] flex justify-center items-center asking max-h-[0px] opacity-0 transition-all duration-500 py-2 px-3 
                                    transform -top-1/2 -translate-y-full left-0 lg:left-1/2 -translate-x-[25%] lg:-translate-x-1/2 peer-hover:max-h-[200px] peer-hover:opacity-100">
                                    <div class=" relative z-10">
                                        <p class=" text-[13px] font-normal text-white">Adding these services
                                            brings extra features and enhances the design. However, it may impact delivery
                                            time, which we'll discuss over the call.</p>
                                    </div>
                                    <div
                                        class="w-5 h-5 bg-[#020B1F] rotate-45 absolute -bottom-2 left-[25%] lg:left-1/2 translate-x-0 lg:-translate-x-1/2 z-10 ">
                                    </div>
                                </div>
                            </div>
                            <transition>
                                <span v-if="selectedPeriod !== null && selectedServices.length < 1" class="body-2 text-[#BF4A5E]">Required field.</span>
                            </transition>
                        </div>
                        <div class="service-list flex gap-x-2 gap-y-3 flex-wrap w-full" v-if="services">
                            <template v-for="(service, index) in services" :key="index">
                                <label
                                    class="checkbox-group px-4 py-3 text-[14px] font-medium leading-[19.6px] tracking-[0.28px]"
                                    :class="service.isActive ? 'is_active' : ''">
                                    <input type="checkbox" :id="service.serviceName + '-id'" :value="service"
                                        @change="serviceChange(service, index)">
                                    <span>{{service.serviceName}}</span>
                                </label>
                            </template>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 project-period">
                        <div class="project-period-label relative">
                            <p class="body-1 font-medium leading-[22.4px] tracking-[0.32px text-black]">Project period
                                estimation</p>
                            <div class="relative">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="peer relative z-10">
                                    <path
                                        d="M10.0001 17.7901C14.3025 17.7901 17.7903 14.3024 17.7903 9.99998C17.7903 5.69761 14.3025 2.20984 10.0001 2.20984C5.69773 2.20984 2.20996 5.69761 2.20996 9.99998C2.20996 14.3024 5.69773 17.7901 10.0001 17.7901Z"
                                        stroke="#020B1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M11.1005 13.3082L10.8335 13.3082C10.3732 13.3082 10.0001 12.9351 10.0001 12.4749L10.0001 9.4054L9.41113 9.4054"
                                        stroke="#020B1F" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="10.0001" cy="6.85017" r="0.867988" fill="#020B1F" />
                                </svg>
                                <div class="period-message w-[270px] z-50 absolute asking transform -top-1/2 -translate-y-full lg:left-1/2 -translate-x-1/2 left-0">
                                    <div
                                        class="message w-full h-fit rounded-xl bg-[#020B1F] flex justify-center items-center max-h-[0px] opacity-0 transition-all duration-500 overflow-hidden"
                                        :class="{'show-period-message' : showPeriodMessage}">
                                        <div class=" relative z-20">
                                            <p class="text-[13px] font-semibold leading-[20px] text-white text-justify">Minimum booking</p>
                                            <div class="py-1"><div class="w-full h-[1px] bg-[#FFFFFF1A]/10"></div></div>
                                            <p class=" text-[13px] font-normal text-white text-justify ">UI, UX & Illustration: 1 month</p>
                                            <p class=" text-[13px] font-normal text-white text-justify ">Animation & marketing design: 1 week</p>
                                        </div>
                                        <div
                                            class="w-5 h-5 bg-[#020B1F] rotate-45 absolute -bottom-2 lg:left-1/2 left-1/2 lg:-translate-x-1/2 translate-x-0 z-10 ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <transition>
                            <span v-if="!validation_period" class="body-2 text-[#BF4A5E]">Required field.</span>
                        </transition> -->
                        <div class="grid grid-cols-3 lg:grid-cols-5 gap-x-2 gap-y-3 w-full period-list" v-if="projectPeriod">
                            <template v-for="(period, index) in projectPeriod" :key="index">
                                <label 
                                    class="radio-group items-center text-[14px] flex flex-col justify-center text-center font-medium leading-[19.6px] tracking-[0.28px] w-[92px] h-[110px] rounded-[20px] border-[#905ABB]/25"
                                    :class="{
                                            'relative' : period.discount > 0,
                                            'service-invalid' : validation_service === false,
                                            'is_active' : period.isActive === true
                                            }" :disabled="period.minimalBooking < minimalBook ? 'disabled' : ''">
                                    <input type="radio" :id="period.label + '-id'" :value="period"
                                        v-model="selectedPeriod" @click="periodClickHandler(period.label, index)">
                                    <span class="whitespace-pre-wrap text-[14px] font-medium">{{period.label}}
                                        <template v-if="period.pricePerHour > 0">
                                            <span class="text-[13px] font-medium text-[#6D727E] tracking-[0.26px]">
                                                ({{ period.kurs + period.pricePerHour }}/hour)
                                            </span>
                                        </template>

                                        <template v-if="period.discount > 0">
                                            <span
                                                class="text-[11px] font-medium text-white leading-[15.4px] py-1 px-2 bg-[#905ABB] rounded-full absolute whitespace-nowrap top-2 right-2">
                                                {{ period.discount + "% OFF" }}
                                            </span>
                                        </template>
                                    </span>

                                </label>

                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full right h-fit"
                style="background: linear-gradient(0deg, #FBF3FF 0%, #EEF2FC 54.20%, #F1F4FE 100%);">
                <transition>
                    <FormGit :subtotal="subtotal" :total="total" @submited="submitAction"
                        :selectedPeriod="selectedPeriod"
                        :selectedServices="selectedServices" @validateService="(value)=>{validation_service = value}"
                        @validatePeriod="(value)=>{validation_period = value}">
                    </FormGit>
                </transition>
                
            </div>
            <slot name="security"></slot>
        </div>
    </transition>

    <Modal v-model="isShow" :close="closeModal">
        <div class="modal lg:w-[480px] rounded-[20px] bg-white relative pt-[42px] pb-12 lg:pb-6 px-6 lg:px-[60px]">
            <svg-vue v-if="restSubmitResult.status === 'success'" icon="default/thanks_logo" alt="thanks popup dialog" class="icon mx-auto mb-[34px]" width="100px" height="100px">
            </svg-vue>
            <p class="heading-3 text-center text-[#020B1F] pb-3">
                {{restSubmitResult.title}}
            </p>
            <p class="body-1 pb-12 leading-relaxed tracking-[0.16px] text-center">{{restSubmitResult.message}}</p>

            <!-- <div class="modal-footer w-full flex justify-center">
                <a href="/" title="Orely Design Studio" class="btn btn__primary text-[14px] font-semibold">Back to homepage</a>
            </div> -->
            <button title="Close" class="btn btn__tertiary icon-only ico__close-white bg-[#A1A4AC] absolute top-0 right-0 transform translate-x-[45%] -translate-y-[45%]" @click="closeModal"></button>
        </div>
  </Modal>
</template>
<script>
    import FormGit from './vuecomp/FormGit.vue';
    import Loading from "vue-loading-overlay";
    import "vue-loading-overlay/dist/css/index.css";
    import { isProxy, nextTick, toRaw } from 'vue';

    export default {
        components: {
            FormGit,
            Loading
        },
        props:{
            showTrialButton:{
                type: Boolean,
                default: true
            }
        },
        data() {
            return {
                services: [{
                        serviceName: 'UX Design',
                        isActive: false,
                        desc: 'Providing dynamic web design and mobile apps that are essential for meeting both user needs and business goals through a user-centered design process.',
                        setting: {
                            borderColor: '#375AB5'
                        },
                        price: 1500,
                        kurs: '$',
                        projectDurationsCount: '140',
                        projectDurations: 'hours/month',
                        minimalBooking: 2
                    },
                    {
                        serviceName: 'UI Design',
                        isActive: false,
                        desc: 'Providing dynamic web design and mobile apps that are essential for meeting both user needs and business goals through a user-centered design process.',
                        setting: {
                            borderColor: '#388048'
                        },
                        price: 3000,
                        kurs: '$',
                        projectDurationsCount: '140',
                        projectDurations: 'hours/month',
                        minimalBooking: 2
                    },
                    {
                        serviceName: 'Illustration',
                        isActive: false,
                        desc: 'Make your ideas and envision come true with our illustrations. We provide tailored, high-quality visuals that bring your brand to life.',
                        setting: {
                            borderColor: '#AE5C11'
                        },
                        price: 2000,
                        kurs: '$',
                        projectDurationsCount: '140',
                        projectDurations: 'hours/month',
                        minimalBooking: 2
                    },
                    {
                        serviceName: 'Animation',
                        isActive: false,
                        desc: 'Make your ideas and envision come true with our Animation.',
                        setting: {
                            borderColor: '#AE5C11'
                        },
                        price: 1200,
                        kurs: '$',
                        projectDurationsCount: '35',
                        projectDurations: 'hours/week',
                        minimalBooking: 1
                    },
                    {
                        serviceName: 'Marketing Design',
                        isActive: false,
                        desc: 'Make your ideas and envision come true with our Marketing Design.',
                        setting: {
                            borderColor: '#AE5C11'
                        },
                        price: 1000,
                        kurs: '$',
                        projectDurationsCount: '35',
                        projectDurations: 'hours/week',
                        minimalBooking: 1
                    }
                ],
                projectPeriod: [
                    {
                        label: '3 Days Trial',
                        pricePerHour: 10,
                        kurs: '$',
                        discount: 0,
                        minimalBooking: 2
                    },
                    {
                        label: '1 Week',
                        pricePerHour: 0,
                        kurs: '$',
                        discount: 0,
                        minimalBooking: 1
                    },
                    {
                        label: '1 Month',
                        pricePerHour: 0,
                        kurs: '$',
                        discount: 0,
                        minimalBooking: 2
                    },
                    {
                        label: '3 Months',
                        pricePerHour: 0,
                        kurs: '$',
                        discount: 10,
                        minimalBooking: 2
                    },
                    {
                        label: 'Annually',
                        pricePerHour: 0,
                        kurs: '$',
                        discount: 20,
                        minimalBooking: 2
                    },
                ],
                benefits: [
                    'Project Manager',
                    'Creative Director'
                ],
                benefitsStarted: [
                    'Unlimited design request',
                    'Unlimited Revision'
                ],
                selectedServices: [],
                selectedPeriod: null,
                total: 0,
                subtotal: 0,
                minimalBook: 0,
                projectDurationsCount: 0,
                projectDurations: '',
                validation_service: true,
                validation_period: true,
                projectPerHour: 0,
                valid_send_data: false,
                isShow: false,
                restSubmitResult: {
                    status:'',
                    title: '',
                    message: '',
                },
                isLoading: false,
                showPeriodMessage: false
            }
        },

        watch: {
            selectedServices: {
                handler() {
                    if (this.selectedPeriod!==null) {
                        this.getSubtotal();
                        if (this.selectedServices.length > 0) {
                            this.validation_service = true;
                        } else {
                            this.validation_service = false;
                            this.subtotal = 0;
                            this.total = 0;
                        }
                    }
                }
            },
            selectedPeriod: {
                handler() {
                    if (this.selectedPeriod !== null) {
                        this.validation_period = true;

                        if (!this.selectedServices.length > 0) {
                            this.validation_service == false;
                        }else{
                            this.validation_service == true;
                        }

                        if (this.selectedPeriod !== null || this.selectedPeriod !== {}) {
                            this.projectPerHour = this.selectedPeriod.pricePerHour;
                        } else {
                            this.projectPerHour = 0;
                        }
                        this.getSubtotal();
                    } else {
                        this.validation_period = false;
                        this.subtotal = 0;
                        this.total = 0;
                    }
                }
            },
            projectPerHour: {
                handler() {
                    this.getSubtotal();
                }
            }
        },

        methods: {
            periodClickHandler(value, ind) {
                for (let index = 0; index < this.projectPeriod.length; index++) {
                    const element = this.projectPeriod[index];
                    if (index !== ind) {
                        element.isActive = false
                    }else{
                        if (this.projectPeriod[ind].isActive !== true) {
                            this.projectPeriod[ind].isActive = true;
                        }else{
                            this.projectPeriod[ind].isActive = false;
                        }
                    }
                    
                }

                let rawData = this.selectedPeriod;
                if (isProxy(this.selectedPeriod)) {
                    rawData = toRaw(this.selectedPeriod)
                }
                if (rawData !== null) {
                    if (value === rawData.label) {
                        this.selectedPeriod = null;
                        this.validation_period = false;
                    }
                }

                if (this.selectedPeriod !== null) {
                    this.validation_period = true;
                    if (this.selectedServices.length === []) {
                        this.validation_service == false;
                    }else{
                        this.validation_service == true;
                    }
                }else{
                    this.validation_period = false;
                }
            },
            getBenefit(value) {
                let stringResult = '';
                if (this.selectedServices.length > 0) {
                    value.forEach((data, index) => {
                        stringResult += data;
                        if (index < (value.length - 1)) {
                            stringResult += ', '
                        }
                    });
                }

                return stringResult;
            },

            getStartedBenefit(value) {
                let stringResult = '';
                if (this.selectedServices.length > 0) {
                    value.forEach((data, index) => {
                        let start = '';
                        for (let i = 0; i < (parseInt(index) + 1); i++) {
                            start += '*';
                        }
                        stringResult += start + data;
                        start = '';
                        if (index < (value.length - 1)) {
                            stringResult += ', '
                        }
                    });
                }

                return stringResult;
            },

            getSubtotal() {
                if (this.selectedPeriod !== null && this.selectedServices.length > 0) {
                    let total = 0;
                    if (this.projectPerHour == 0) {
                        this.selectedServices.forEach(data => {
                            if (this.selectedPeriod.label === '1 Week') {
                                total += Math.round(((data.price) * (100 - 10)) / 100);
                            } else {
                                total += data.price;
                            }
                        });
                        this.subtotal = total - 1;
                        this.total = total - 1;
                        if (this.selectedPeriod && this.selectedPeriod.discount) {
                            this.subtotal = Math.round((this.subtotal * (100 - this.selectedPeriod.discount)) / 100);
                        }
                    } else {
                        this.subtotal = 210;
                        this.total = 0;
                        this.projectDurationsCount = 7;
                        this.projectDurations = 'hour/day';
                    }

                    this.minimalBook = 0;
                    this.projectDurationsCount = 0;
                    this.projectDurations = '';
                    this.selectedServices.forEach(service => {
                        if (this.minimalBook < service.minimalBooking) {
                            this.minimalBook = service.minimalBooking;
                            this.projectDurationsCount = parseInt(service.projectDurationsCount);
                            this.projectDurations = service.projectDurations;
                        }
                    })

                    if (this.projectPerHour !== 0) {
                        this.projectDurationsCount = 7;
                        this.projectDurations = 'hour/day';
                    }
                } else {
                    this.subtotal = 0;
                    this.total = 0;
                    this.minimalBook = 0;
                    this.projectDurationsCount = 0;
                    this.projectDurations = '';
                }
            },

            serviceChange(service, ind) {
                if (this.services[ind].isActive === false) {
                    this.services[ind].isActive = true;
                }else{
                    this.services[ind].isActive = false;
                }
                if (this.selectedServices.length > 0) {
                    let serviceIndex = -1;
                    for (let index = 0; index < this.selectedServices.length; index++) {
                        const element = this.selectedServices[index];
                        if (element.serviceName === service.serviceName) {
                            serviceIndex = index;
                        }
                    }

                    if (serviceIndex > -1) {
                        this.selectedServices.splice(serviceIndex, 1);
                        this.minimalBook = 0;
                        this.selectedServices.forEach(service => {
                            if (this.minimalBook < service.minimalBooking) {
                                this.minimalBook = service.minimalBooking;
                                this.projectDurationsCount = parseInt(service.projectDurationsCount);
                                this.projectDurations = service.projectDurations;
                            }
                        })
                    } else {
                        this.selectedServices.push(service);
                        this.selectedServices.forEach(service => {
                            if (this.minimalBook < service.minimalBooking) {
                                this.minimalBook = service.minimalBooking;
                                this.projectDurationsCount = parseInt(service.projectDurationsCount);
                                this.projectDurations = service.projectDurations;
                            }
                        })
                    }
                } else {
                    this.selectedServices.push(service);
                    this.selectedServices.forEach(service => {
                        if (this.minimalBook < service.minimalBooking) {
                            this.minimalBook = service.minimalBooking;
                            this.projectDurationsCount = parseInt(service.projectDurationsCount);
                            this.projectDurations = service.projectDurations;
                        }
                    })
                }

                this.getSubtotal();
                if (this.selectedPeriod !== null ) {
                    if (this.selectedServices.length < 1) {
                        this.validation_service = false;
                    } else {
                        this.validation_service = true;
                    }
                }
            },

            submitAction(bookingData) {
                this.isLoading = true;
                if (this.selectedPeriod === null || this.selectedPeriod === {}) {
                    
                }else{
                    if (this.selectedServices.length < 1) {
                        this.validation_service = false;
                    }else{
                        this.validation_service = true;
                    }

                    if (this.selectedPeriod.minimalBooking < this.minimalBook) {
                        this.validation_period = false;
                    }else{
                        this.validation_period = true;
                    }
                    
                }

                if (this.validation_period) {
                    if (this.validation_service && bookingData[6]) {
                        this.valid_send_data = true;
                    }else{
                        this.valid_send_data = false;
                    }
                }else{
                    if (bookingData[6]) {
                        this.valid_send_data = true;
                    }else{
                        this.valid_send_data = false;
                    }
                }


                if (this.valid_send_data) {
                    
                    let selectedServiceString = '';
                    this.selectedServices.forEach((el, index) => {
                        selectedServiceString += el.serviceName + '#' + el.price;
                        if (index < this.selectedServices.length - 1) {
                            selectedServiceString += ', '
                        }
                    })

                    let serviceArray = selectedServiceString.split(",");
                    let selectedServices = ""
                    if (serviceArray.length > 0) {
                        serviceArray.forEach((service, index) => {
                            let splitService = service.split('#');
                            selectedServices += splitService[0];
                            if (index < serviceArray.length - 1) {
                                selectedServices += ", "
                            }
                        })
                    }

                    let formData = {
                        fullName: bookingData[0],
                        company: bookingData[1],
                        email: bookingData[2],
                        message: bookingData[3],
                        nda: bookingData[5],
                        project_period: this.selectedPeriod !== null ? this.selectedPeriod.label : '',
                        services: selectedServices,
                        file_upload: bookingData[4],
                        total_order: this.subtotal,
                        form: 'Get In Touch'
                    };
                    this.$api.BookingServices.actionSubmited(formData).then((result) => {
                        this.isLoading = false;
                        setTimeout(() => {
                            let resultData = result.data.replace('}0', '}')
                            let jsonData = JSON.parse(resultData);
                            
                            this.restSubmitResult.status = jsonData.status
                            this.restSubmitResult.title = jsonData.title
                            this.restSubmitResult.message = jsonData.message
                            this.showModal()
                            }, 500);
                        return;
                    })
                }else{
                    this.isLoading = false;
                }
            },

            showModal() {
                this.isShow = true;
            },

            closeModal() {
                this.isShow = false;
                this.restSubmitResult.status = ''
                this.restSubmitResult.logo = ''
                this.restSubmitResult.title = ''
                this.restSubmitResult.message = ''
                window.location.reload();
            }
        },
    }
</script>
<style lang="scss" scoped>
    .pricing-form {

        .services-label,
        .project-period-label {
            @apply flex gap-[6px] items-center;
            svg:hover ~div.period-message div.message{
                @apply max-h-[200px] opacity-100 py-2 px-3;
            }
        }

        .period-list input[type='radio'] {
            @apply hidden;
        }

    }

    .modal {
        box-sizing: border-box;
    }

    .show-period-message{
        @apply max-h-[200px] opacity-100 py-2 px-3;
    }
</style>

<style>
    .vue-universal-modal-content{
        @apply max-lg:px-6;
    }
    .vue-universal-modal.vue-universal-modal-show{
        @apply z-[99999] bg-[#020B1F]/60 backdrop-blur-[5px];
    }

    .service-list .checkbox-group.is_active{
        @apply bg-secondary;
    }

    .period-list .radio-group.is_active{
        @apply bg-secondary;
    }
</style>
